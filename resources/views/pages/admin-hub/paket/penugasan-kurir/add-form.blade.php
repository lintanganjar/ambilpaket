@php
    $areas = ['Area 1', 'Area 2', 'Area 3'];

    $packages = [];
    foreach ($areas as $index => $area) {
        for ($i = 1; $i <= 20; $i++) {
            $packages[] = [
                'id' => $index * 20 + $i,
                'area' => $area,
                'name' => "Paket {$area} - {$i}",
                'resi' => strtoupper(uniqid("RESI{$index}-")),
            ];
        }
    }
@endphp

<form action="#" method="POST">
    <div class="col-span-3 mb-4">
        <div class="grid grid-cols-12 gap-4">
            <div class="lg:col-span-2 col-span-12 flex items-center">
                <h2 class="text-xs font-medium text-gray-900 dark:text-white">Area</h2>
            </div>
            <div class="lg:col-span-10 col-span-12">
                <div class="relative">
                    <select id="area-select" name="area_id"
                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer">
                        <option value="" disabled selected>Pilih Area</option>
                        @foreach ($areas as $area)
                            <option value="{{ $area }}">{{ $area }}</option>
                        @endforeach
                    </select>
                    <label for="area-select"
                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Area</label>
                </div>
            </div>
        </div>
    </div>

    <!-- Daftar Paket -->
    <div id="package-list" class="col-span-3 hidden">
        <h2 class="mb-2 text-sm font-medium text-gray-900 dark:text-white">Daftar Paket</h2>
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-12">
                <ul id="packages-container"
                    class="grid grid-cols-2 gap-4 text-xs text-gray-900   dark:text-white dark:bg-gray-800 dark:border-gray-600">
                </ul>
            </div>
        </div>
    </div>

    <script>
        const packages = @json($packages);

        document.getElementById('area-select').addEventListener('change', function() {
            const selectedArea = this.value;
            const packageList = document.getElementById('package-list');
            const packagesContainer = document.getElementById('packages-container');

            packagesContainer.innerHTML = '';

            const filteredPackages = packages.filter(pkg => pkg.area === selectedArea);

            if (filteredPackages.length > 0) {
                filteredPackages.forEach(pkg => {
                    const listItem = document.createElement('li');
                    listItem.className =
                        'flex p-4 border rounded-lg bg-white dark:bg-gray-700 cursor-pointer transition transform hover:scale-105 hover:shadow-lg';

                    const label = document.createElement('label');
                    label.className = 'flex items-start w-full cursor-pointer';

                    const checkbox = document.createElement('input');
                    checkbox.type = 'checkbox';
                    checkbox.name = 'packages[]';
                    checkbox.value = pkg.id;
                    checkbox.className =
                        'w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 mt-1.5 mr-4';

                    const packageInfo = document.createElement('div');
                    packageInfo.className = 'text-sm text-gray-700 dark:text-gray-300';
                    packageInfo.innerHTML = `
        ${pkg.name} <br>
        ${pkg.resi}
    `;

                    label.appendChild(checkbox);
                    label.appendChild(packageInfo);

                    listItem.appendChild(label);

                    packagesContainer.appendChild(listItem);
                });


                packageList.classList.remove('hidden');
            } else {
                packageList.classList.add('hidden');
            }
        });
    </script>
