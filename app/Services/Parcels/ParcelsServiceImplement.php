<?php

namespace App\Services\Parcels;

use Exception;
use App\Models\Area;
use App\utils\CekResi;
use App\Models\Parcels;
use App\Models\Timeline;
use App\utils\ResiNumber;
use InvalidArgumentException;
use App\Models\ParcelAssignment;
use Illuminate\Support\Facades\DB;
use LaravelEasyRepository\Service;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Parcels\ParcelsRepository;
use App\Repositories\ServiceType\ServiceTypeRepository;
use App\Repositories\ParcelAssignment\ParcelAssignmentRepository;
use Illuminate\Support\Arr;

class ParcelsServiceImplement extends Service implements ParcelsService
{

  /**
   * don't change $this->mainRepository variable name
   * because used in extends service class
   */
  protected $mainRepository, $serviceTypeRepository, $parcelAssignmentRepository;

  public function __construct(ParcelsRepository $mainRepository,  ServiceTypeRepository $serviceTypeRepository, ParcelAssignmentRepository $parcelAssignmentRepository)
  {
    $this->mainRepository = $mainRepository;
    $this->serviceTypeRepository = $serviceTypeRepository;
    $this->parcelAssignmentRepository = $parcelAssignmentRepository;
  }

  public function getAllWithSearch($request)
  {
    return $this->mainRepository->getAllWithSearch($request);
  }

  public function getByResi($resi)
  {
    $parcel = $this->mainRepository->getByResi($resi);
    $parcelType = $this->serviceTypeRepository->getTypeWithId($parcel['servicePrice']['service_type_id']);
    $courier = $parcelType['serviceProvider']['courier_code'];
    if ($parcel['resi_number'] == $parcel['actual_resi_number']) {
      return $parcel;
    } else {
      $data = [
        "resi" => $parcel['actual_resi_number'], //'11000783697024', 
        "courier" => $courier, //'anteraja',  
      ];
      $response = CekResi::CekResi($data);
      return [$response, $parcel];
    }
    return $this->mainRepository->getByResi($resi);
  }

  public function getOngoingParcels($search)
  {
    return $this->mainRepository->getParcelsByStatus('Dalam Perjalanan', $search);
  }

  public function getSuccessfulParcels($search)
  {
    return $this->mainRepository->getParcelsByStatus('Selesai', $search);
  }

  public function getFailedParcels($search)
  {
    return $this->mainRepository->getParcelsByStatus('Gagal', $search);
  }
  public function getCourierAssignmentsHistory($courierId, $search)
  {
    return $this->parcelAssignmentRepository->getCourierAssignmentsHistory($courierId, $search);
  }


  public function insertParcel(array $data)
  {
    try {
      $validator = Validator::make($data, [
        'agen_id' => 'bail|required|integer',
        'customer_id' => 'nullable|integer',
        'customer_umkm_id' => 'nullable|integer',
        'price' => 'bail|required|integer',
        'agen_commission' => 'bail|required|integer',
        'item_type' => 'bail|required|in:Barang,Dokumen',
        'item_name' => 'bail|required|string|max:255',
        'amount' => 'bail|required|integer',
        'weight' => 'bail|required|string|max:20',
        'item_height' => 'nullable|string|max:20',
        'item_width' => 'nullable|string|max:20',
        'item_lenght' => 'nullable|string|max:20',
        'note' => 'nullable|string',
        'service_price_id' => 'bail|required|integer',
        'estimation_date' => 'bail|required|string|max:255',
        'receiver_origin' => 'nullable|string|max:255',
        'proof_img' => 'bail|required|string|max:255',
        'status' => 'bail|required|in:Gagal,Selesai,Dalam Perjalanan',
      ], [
        'agen_id' => [
          'required' => 'ID Agen wajib diisi.',
          'integer' => 'ID Agen harus berupa angka.',
        ],
        'customer_id' => [
          'integer' => 'ID Pelanggan harus berupa angka.',
        ],
        'customer_umkm_id' => [
          'integer' => 'ID Pelanggan UMKM harus berupa angka.',
        ],
        'price' => [
          'required' => 'Harga wajib diisi.',
          'integer' => 'Harga harus berupa angka.',
        ],
        'agen_commission' => [
          'required' => 'Komisi Agen wajib diisi.',
          'integer' => 'Komisi Agen harus berupa angka.',
        ],
        'item_type' => [
          'required' => 'Tipe item wajib dipilih.',
          'in' => 'Tipe item tidak valid.',
        ],
        'item_name' => [
          'required' => 'Nama item wajib diisi.',
          'string' => 'Nama item harus berupa teks.',
          'max' => 'Nama item maksimal 255 karakter.',
        ],
        'amount' => [
          'required' => 'Jumlah item wajib diisi.',
          'integer' => 'Jumlah item harus berupa angka.',
        ],
        'weight' => [
          'required' => 'Berat item wajib diisi.',
          'string' => 'Berat item harus berupa teks.',
          'max' => 'Berat item maksimal 20 karakter.',
        ],
        'item_height' => [
          'string' => 'Tinggi item harus berupa teks.',
          'max' => 'Tinggi item maksimal 20 karakter.',
        ],
        'item_width' => [
          'string' => 'Lebar item harus berupa teks.',
          'max' => 'Lebar item maksimal 20 karakter.',
        ],
        'item_lenght' => [
          'string' => 'Panjang item harus berupa teks.',
          'max' => 'Panjang item maksimal 20 karakter.',
        ],
        'note' => [
          'string' => 'Catatan harus berupa teks.',
        ],
        'service_price_id' => [
          'required' => 'ID Harga Jasa wajib diisi.',
          'integer' => 'ID Harga Jasa harus berupa angka.',
        ],
        'estimation_date' => [
          'required' => 'Tanggal Estimasi wajib diisi.',
          'string' => 'Tanggal Estimasi harus berupa teks.',
          'max' => 'Tanggal Estimasi maksimal 255 karakter.',
        ],
        'receiver_origin' => [
          'string' => 'Penerima Paket harus berupa teks.',
          'max' => 'Penerima Paket maksimal 255 karakter.',
        ],
        'proof_img' => [
          'required' => 'Bukti Pengiriman wajib diisi.',
          'string' => 'Bukti Pengiriman harus berupa teks.',
          'max' => 'Bukti Pengiriman maksimal 255 karakter.',
        ],
        'status' => [
          'required' => 'Status wajib dipilih.',
          'in' => 'Status tidak valid.',
        ],
      ]);

      // Generate resi_number
      $data['resi_number'] = ResiNumber::generateResiNumber();

      // Jika validasi gagal, lempar exception dengan pesan error pertama
      if ($validator->fails()) {
        throw new InvalidArgumentException($validator->errors()->first());
      }

      return $this->mainRepository->insertParcel($data);
    } catch (InvalidArgumentException $e) {
      return response()->json([
        'message' => $e->getMessage()
      ], 400);
    } catch (\Exception $e) {
      return response()->json([
        'message' => 'Something went wrong. Please try again.',
        'error' => $e->getMessage()
      ], 500);
    }
  }


  public function updateParcel($id, array $data)
  {
    if (empty($id)) {
      throw new InvalidArgumentException('ID tidak boleh kosong');
    }

    $parcel = $this->mainRepository->getById($id);
    if (!$parcel) {
      throw new InvalidArgumentException('Parcel tidak ditemukan');
    }

    $validator = Validator::make($data, [
      'agen_id' => 'nullable|integer',
      'customer_id' => 'nullable|integer',
      'customer_umkm_id' => 'nullable|integer',
      'price' => 'nullable|integer',
      'agen_commission' => 'nullable|integer',
      'item_type' => 'nullable|in:Barang,Dokumen',
      'item_name' => 'nullable|string|max:255',
      'amount' => 'nullable|integer',
      'weight' => 'nullable|string|max:20',
      'item_height' => 'nullable|string|max:20',
      'item_width' => 'nullable|string|max:20',
      'item_lenght' => 'nullable|string|max:20',
      'note' => 'nullable|string',
      'service_price_id' => 'nullable|integer',
      'estimation_date' => 'nullable|string|max:255',
      'receiver_origin' => 'nullable|string|max:255',
      'proof_img' => 'nullable|string|max:255',
      'status' => 'nullable|in:Gagal,Selesai,Dalam Perjalanan',
    ], [
      'agen_id.integer' => 'ID Agen harus berupa angka.',
      'customer_id.integer' => 'ID Pelanggan harus berupa angka.',
      'customer_umkm_id.integer' => 'ID Pelanggan UMKM harus berupa angka.',
      'price.integer' => 'Harga harus berupa angka.',
      'agen_commission.integer' => 'Komisi Agen harus berupa angka.',
      'item_type.in' => 'Tipe item tidak valid.',
      'item_name.string' => 'Nama item harus berupa teks.',
      'item_name.max' => 'Nama item maksimal 255 karakter.',
      'amount.integer' => 'Jumlah item harus berupa angka.',
      'weight.string' => 'Berat item harus berupa teks.',
      'weight.max' => 'Berat item maksimal 20 karakter.',
      'item_height.string' => 'Tinggi item harus berupa teks.',
      'item_height.max' => 'Tinggi item maksimal 20 karakter.',
      'item_width.string' => 'Lebar item harus berupa teks.',
      'item_width.max' => 'Lebar item maksimal 20 karakter.',
      'item_lenght.string' => 'Panjang item harus berupa teks.',
      'item_lenght.max' => 'Panjang item maksimal 20 karakter.',
      'note.string' => 'Catatan harus berupa teks.',
      'service_price_id.integer' => 'ID Harga Jasa harus berupa angka.',
      'estimation_date.string' => 'Tanggal Estimasi harus berupa teks.',
      'estimation_date.max' => 'Tanggal Estimasi maksimal 255 karakter.',
      'receiver_origin.string' => 'Penerima Paket harus berupa teks.',
      'receiver_origin.max' => 'Penerima Paket maksimal 255 karakter.',
      'proof_img.string' => 'Bukti Pengiriman harus berupa teks.',
      'proof_img.max' => 'Bukti Pengiriman maksimal 255 karakter.',
      'status.in' => 'Status tidak valid.',
    ]);

    if ($validator->fails()) {
      throw new InvalidArgumentException($validator->errors()->first());
    }

    DB::beginTransaction();

    try {
      $result = $this->mainRepository->update($id, $data);

      if (!$result) {
        throw new InvalidArgumentException('Gagal mengupdate data');
      }

      DB::commit();
      return $result;
    } catch (Exception $e) {
      DB::rollBack();
      Log::info($e->getMessage());
      throw new InvalidArgumentException('Gagal mengupdate data: ' . $e->getMessage());
    }
  }

  public function deleteParcel($id)
  {
    DB::beginTransaction();

    try {
      $result = $this->mainRepository->delete($id);
    } catch (Exception $e) {
      DB::rollBack();
      Log::info($e->getMessage());

      throw new InvalidArgumentException('Unable to Delete Data');
    }

    DB::commit();
    return $result;
  }

  public function updateTimeline($resi, array $timelineData)
  {
    return $this->mainRepository->updateTimelineParcelByResi($resi, $timelineData);
  }

  public function getAssignableParcels($courierAreaId)
  {
    // Ambil area berdasarkan ID lokasi kurir
    $area = Area::findOrFail($courierAreaId);

    // Query paket yang berada di area yang sama
    $parcels = Parcels::whereHas('area', function ($query) use ($area) {
      $query->where('id', $area->id);
    })
      ->whereNull('status') // Paket yang belum ditugaskan
      ->get();

    return $parcels;
  }

  public function assignCourierToParcel(array $parcelIds, $courierId, $statusReason)
  {
    $assignments = [];

    foreach ($parcelIds as $parcelId) {
      $assignment = ParcelAssignment::updateOrCreate(
        ['parcel_id' => $parcelId],
        [
          'kurir_id' => $courierId,
          'assignment_date' => now(),
          'status' => 'Berhasil',
          'status_reason' => $statusReason,  // Menyimpan status_reason yang diterima
        ]
      );

      // Menyimpan assignment yang berhasil
      $assignments[] = $assignment;
    }

    return $assignments;
  }

  public function markParcelArrived($request)
  {
    $parcelId = $request->input('parcel_id');

    // Periksa apakah paket ada
    $parcel = $this->mainRepository->getById($parcelId);
    if (!$parcel) {
      return response()->json([
        'message' => 'Paket tidak ditemukan.',
      ], 404);
    }

    // Catat status "Masuk" ke timeline
    Timeline::create([
      'parcel_id' => $parcelId,
      'date' => now(),
      'detail' => 'Paket telah ditandai masuk.',
    ]);

    return response()->json([
      'message' => 'Paket berhasil ditandai masuk.',
    ], 200);
  }

  public function markParcelDispatched($request)
  {
    $parcelId = $request->input('parcel_id');

    // Periksa apakah paket ada
    $parcel = $this->mainRepository->getById($parcelId);
    if (!$parcel) {
      return response()->json([
        'message' => 'Paket tidak ditemukan.',
      ], 404);
    }

    // Catat status "Keluar" ke timeline
    Timeline::create([
      'parcel_id' => $parcelId,
      'date' => now(),
      'detail' => 'Paket telah ditandai keluar.',
    ]);

    return response()->json([
      'message' => 'Paket berhasil ditandai keluar.',
    ], 200);
  }

  public function getParcelsForChartThisYear(?string $StartDate, ?string $EndDate)
  {
    if($StartDate && $EndDate){
      return $this->mainRepository->getParcelsForChartThisYear($StartDate, $EndDate);
    }
    return $this->mainRepository->getParcelsForChartThisYear(null,null);
  }

  public function newParcel(array $data){
    try {
      $validator = Validator::make($data,[
        'merch.select' => 'required',
        'merch.ammount' => 'required|integer|min:1',
        'merch.date' => 'required|date',
        'merch.note' => 'nullable|string',
    
        'receiver.first_name' => 'required|string',
        'receiver.last_name' => 'required|string',
        'receiver.address' => 'required|string',
        'receiver.province' => 'required|string',
        'receiver.regency' => 'required|string',
        'receiver.district' => 'required|string',
    
        'status' => 'required',
      ], [
        'merch.select.required' => 'Pilih jenis merchandise wajib diisi.',
        'merch.ammount.required' => 'Jumlah merchandise wajib diisi.',
        'merch.ammount.integer' => 'Jumlah merchandise harus berupa angka.',
        'merch.ammount.min' => 'Jumlah merchandise minimal 1.',
        'merch.date.required' => 'Tanggal pemesanan wajib diisi.',
        'merch.date.date' => 'Format tanggal tidak valid.',
        'merch.note.string' => 'Catatan harus berupa teks.',
    
        'receiver.first_name.required' => 'Nama depan penerima wajib diisi.',
        'receiver.last_name.required' => 'Nama belakang penerima wajib diisi.',
        'receiver.address.required' => 'Alamat penerima wajib diisi.',
        'receiver.province.required' => 'Provinsi penerima wajib diisi.',
        'receiver.regency.required' => 'Kabupaten penerima wajib diisi.',
        'receiver.district.required' => 'Kecamatan penerima wajib diisi.',
    
        'status.required' => 'Status pesanan wajib diisi.',
        'status.in' => 'Status pesanan tidak valid. Pilih antara pending, processed, shipped, atau delivered.',
    ]);

      // Generate resi_number
      $data['resi_number'] = ResiNumber::generateResiNumber();

      // Jika validasi gagal, lempar exception dengan pesan error pertama
      if ($validator->fails()) {
        throw new InvalidArgumentException($validator->errors()->first());
      }
      return $this->mainRepository->newParcel($data);
    } catch (InvalidArgumentException $e) {
      throw new InvalidArgumentException($e->getMessage());
    } catch (\Exception $e) {
      throw new Exception($e->getMessage());
    }
  }
}
