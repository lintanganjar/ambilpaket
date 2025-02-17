@php
    $data = (object) [
        'id' => 1,
        'name' => 'Area Jakarta Selatan',
        'regency_id' => (object) [
            'id' => 2,
            'name' => 'Kota Jakarta Selatan',
        ],
        'district_coverage' => [
            (object) [
                'id' => 4,
                'name' => 'Kecamatan Kebayoran Baru',
            ],
            (object) [
                'id' => 5,
                'name' => 'Kecamatan Tebet',
            ],
            (object) [
                'id' => 6,
                'name' => 'Kecamatan Setiabudi',
            ],
        ],
    ];

    $areas = [
        'Kota Jakarta Selatan' => [
            ['id' => 4, 'name' => 'Kecamatan Kebayoran Baru'],
            ['id' => 5, 'name' => 'Kecamatan Tebet'],
            ['id' => 6, 'name' => 'Kecamatan Setiabudi'],
            ['id' => 7, 'name' => 'Kecamatan Baru'],
        ],
        'Kota Jakarta Barat' => [
            ['id' => 7, 'name' => 'Kecamatan Kebon Jeruk'],
            ['id' => 8, 'name' => 'Kecamatan Grogol Petamburan'],
        ],
    ];
@endphp

<form action="#" method="POST">
    <div class="col-span-3">
        <div
            class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <h3 class="mb-6 text-xl font-semibold dark:text-white">Informasi Area</h3>
            <div class="grid grid-cols-12 gap-4">
                <div class="lg:col-span-2 col-span-12 flex items-center">
                    <label for="name" class="text-xs font-medium text-gray-900 dark:text-white">Nama</label>
                </div>
                <div class="lg:col-span-10 col-span-12">
                    <input type="text" id="name"
                        class="block w-full px-2.5 py-3 text-xs text-gray-900 bg-gray-50 rounded-lg border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-white"
                        value="{{ $data->name }}" placeholder="Nama Area" disabled />
                </div>

                <div class="lg:col-span-2 col-span-12 flex items-center">
                    <label for="regency-select"
                        class="text-xs font-medium text-gray-900 dark:text-white">Kabupaten</label>
                </div>
                <div class="lg:col-span-10 col-span-12">
                    <select id="regency-select" name="regency_id" disabled
                        class="block w-full px-2.5 py-3 text-xs text-gray-900 bg-gray-50 rounded-lg border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                        <option value="" disabled selected>Pilih Kabupaten</option>
                        @foreach (array_keys($areas) as $regency)
                            <option value="{{ $regency }}" @if ($regency === $data->regency_id->name) selected @endif>
                                {{ $regency }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div id="district-container" class="col-span-12">
                    <h4 class="mb-2 text-xs text-center font-medium text-gray-900 dark:text-white">Daerah Tercover</h4>
                    <div id="district-checkboxes" class="grid grid-cols-3 gap-4">
                    </div>
                </div>
            </div>

            <script>
                const areas = @json($areas);
                const data = @json($data);

                document.addEventListener('DOMContentLoaded', function() {
                    const selectedRegency = document.getElementById('regency-select').value;
                    const districtCheckboxes = document.getElementById('district-checkboxes');

                    if (areas[selectedRegency]) {
                        districtCheckboxes.innerHTML = '';

                        areas[selectedRegency].forEach(district => {
                            const listItem = document.createElement('li');
                            listItem.className =
                                'flex p-4 border rounded-lg bg-gray-50 dark:bg-gray-700';

                            const label = document.createElement('label');
                            label.className = 'flex items-start w-full';

                            const checkbox = document.createElement('input');
                            checkbox.type = 'checkbox';
                            checkbox.id = `district-${district.id}`;
                            checkbox.name = 'district_ids[]';
                            checkbox.value = district.id;
                            checkbox.className =
                                'w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 mt-1.5 mr-4';
                            checkbox.disabled = true;

                            const isChecked = data.district_coverage.some(d => d.id === district.id);
                            if (isChecked) {
                                checkbox.checked = true;
                            }

                            const districtInfo = document.createElement('div');
                            districtInfo.className = 'text-sm text-gray-700 dark:text-gray-300';
                            districtInfo.innerHTML = `${district.name}`;

                            label.appendChild(checkbox);
                            label.appendChild(districtInfo);

                            listItem.appendChild(label);
                            districtCheckboxes.appendChild(listItem);
                        });
                    }
                });

                document.getElementById('regency-select').addEventListener('change', function() {
                    const selectedRegency = this.value;
                    const districtCheckboxes = document.getElementById('district-checkboxes');

                    districtCheckboxes.innerHTML = '';

                    if (areas[selectedRegency]) {
                        areas[selectedRegency].forEach(district => {
                            const listItem = document.createElement('li');
                            listItem.className =
                                'flex p-4 border rounded-lg bg-gray-50 dark:bg-gray-700';

                            const label = document.createElement('label');
                            label.className = 'flex items-start w-full';

                            const checkbox = document.createElement('input');
                            checkbox.type = 'checkbox';
                            checkbox.id = `district-${district.id}`;
                            checkbox.name = 'district_ids[]';
                            checkbox.value = district.id;
                            checkbox.className =
                                'w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 mt-1.5 mr-4';
                            checkbox.disabled = false;

                            const isChecked = data.district_coverage.some(d => d.id === district.id);
                            if (isChecked) {
                                checkbox.checked = true;
                            }

                            const districtInfo = document.createElement('div');
                            districtInfo.className = 'text-sm text-gray-700 dark:text-gray-300';
                            districtInfo.innerHTML = `${district.name}`;

                            label.appendChild(checkbox);
                            label.appendChild(districtInfo);

                            listItem.appendChild(label);
                            districtCheckboxes.appendChild(listItem);
                        });
                    }
                });
            </script>
        </div>
    </div>
