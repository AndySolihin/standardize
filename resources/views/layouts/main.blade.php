<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    @yield('content')
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // function fillCheckboxes(elementId, data, selectedProses, selectedWorkcenter) {
        //     var filteredData = data.filter(function(item) {
        //         return (
        //             item.nama_kategoriproduk === 'DRY TYPE RESIN' &&
        //             item.nama_workcenter === selectedWorkcenter &&
        //             item.nama_proses === selectedProses
        //         );
        //     });
        //     $(elementId).empty();
        //     $.each(filteredData, function(key, data) {
        //         var checkboxId = 'checkbox_' + key;
        //         var namaProsesLowerCase = data.nama_proses.toLowerCase().replace(/\s+/g, '_');
        //         $(elementId).append(
        //             '<div class="form-check">' +
        //             '<input class="form-check-input" type="checkbox" id="' + checkboxId +
        //             '" name="' + namaProsesLowerCase + '[]" value="' + data.nama_tipeproses +
        //             '" data-durasi="' + data.durasi_manhour + '" data-workcenter="' + data
        //             .nama_workcenter + '">' +
        //             '<label class="form-check-label" for="' + checkboxId + '">' +
        //             data.nama_tipeproses +
        //             '</label>' +
        //             '</div>'
        //         );
        //     });
        // }

        function fillSelect(elementId, data, selectedProses, selectedWorkcenter) {
            var filteredData = data.filter(function(item) {
                return (
                    item.nama_kategoriproduk === 'DRY TYPE RESIN' &&
                    item.nama_workcenter === selectedWorkcenter &&
                    item.nama_proses === selectedProses
                );
            });
            $(elementId).empty();
            $(elementId).append('<option value="">-Pilih-</option>');
            $.each(filteredData, function(key, data) {
                $(elementId).append(
                    '<option value="' + data.nama_tipeproses + '" data-durasi="' + data
                    .durasi_manhour +
                    '" data-workcenter="' + data.nama_workcenter + '">' +
                    data.nama_tipeproses +
                    '</option>'
                );
            });
        }
        $('#ukuran_kapasitas').on('change', function() {
            // event.preventDefault();
            var ukuran_kapasitas = $(this).val();
            console.log(ukuran_kapasitas);
            if (ukuran_kapasitas) {
                $.ajax({
                    url: '/products/create/kapasitas/' + ukuran_kapasitas,
                    type: 'GET',
                    data: {
                        '_token': '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        if (data) {
                            fillSelect('#coil_lv', data, 'COIL LV', 'COIL MAKING');
                            fillSelect('#coil_hv', data, 'COIL HV', 'COIL MAKING');
                            fillSelect('#potong_leadwire', data, 'POTONG LEAD WIRE',
                                'COIL MAKING');
                            fillSelect('#potong_isolasi', data, 'POTONG ISOLASI',
                                'COIL MAKING');
                            fillSelect('#hv_moulding', data, 'HV MOULDING',
                                'MOULD & CASTING');
                            fillSelect('#hv_casting', data, 'HV CASTING',
                                'MOULD & CASTING');
                            fillSelect('#hv_demoulding', data, 'HV DEMOULDING',
                                'MOULD & CASTING');
                            fillSelect('#lv_bobbin', data, 'LV BOBBIN',
                                'MOULD & CASTING');
                            fillSelect('#lv_moulding', data, 'LV MOULDING',
                                'MOULD & CASTING');
                            fillSelect('#touch_up', data, 'TOUCH UP',
                                'MOULD & CASTING');
                            fillSelect('#type_susun_core', data, 'TYPE SUSUN CORE',
                                'CORE COIL ASSEMBLY');
                            fillSelect('#wiring', data, 'WIRING', 'CORE COIL ASSEMBLY');
                            fillSelect('#instal_housing', data, 'INSTAL HOUSING',
                                'CORE COIL ASSEMBLY');
                            fillSelect('#bongkar_housing', data, 'BONGKAR HOUSING',
                                'CORE COIL ASSEMBLY');
                            fillSelect('#pembuatan_cu_link', data, 'PEMBUATAN CU LINK',
                                'CORE COIL ASSEMBLY');
                            fillSelect('#others', data, 'OTHERS', 'CORE COIL ASSEMBLY');
                            fillSelect('#accesories', data, 'ACCESORIES',
                                'CORE COIL ASSEMBLY');
                            fillSelect('#potong_isolasi_fiber', data,
                                'POTONG ISOLASI FIBER', 'CORE COIL ASSEMBLY');
                            fillSelect('#routine_test', data, 'ROUNTINE',
                                'QC TESTv');
                            $('#coil_lv').on('change', function() {
                                showSelected('coil_lv');
                            });
                            $('#coil_hv').on('change', function() {
                                showSelected('coil_hv');
                            });
                            $('#potong_leadwire').on('change', function() {
                                showSelected('potong_leadwire');
                            });
                            $('#potong_isolasi').on('change', function() {
                                showSelected('potong_isolasi');
                            });
                            $('#hv_moulding').on('change', function() {
                                showSelected('hv_moulding');
                            });
                            $('#hv_casting').on('change', function() {
                                showSelected('hv_casting');
                            });
                            $('#hv_demoulding').on('change', function() {
                                showSelected('hv_demoulding');
                            });
                            $('#lv_bobbin').on('change', function() {
                                showSelected('lv_bobbin');
                            });
                            $('#lv_moulding').on('change', function() {
                                showSelected('lv_moulding');
                            });
                            $('#touch_up').on('change', function() {
                                showSelected('touch_up');
                            });
                            $('#type_susun_core').on('change', function() {
                                showSelected('type_susun_core');
                            });
                            $('#wiring').on('change', function() {
                                showSelected('wiring');
                            });
                            $('#instal_housing').on('change', function() {
                                showSelected('instal_housing');
                            });
                            $('#bongkar_housing').on('change', function() {
                                showSelected('bongkar_housing');
                            });
                            $('#pembuatan_cu_link').on('change', function() {
                                showSelected('pembuatan_cu_link');
                            });
                            $('#others').on('change', function() {
                                showSelected('others');
                            });
                            $('#accesories').on('change', function() {
                                showSelected('accesories');
                            });
                            $('#potong_isolasi_fiber').on('change', function() {
                                showSelected('potong_isolasi_fiber');
                            });
                            $('#routine_test').on('change', function() {
                                showSelected('routine_test');
                            });
                        } else {
                            resetForm();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Request Error:', xhr.responseText);
                        alert(
                            'Terjadi kesalahan saat mengambil data barang. Silakan coba lagi.'
                        );
                    }
                });
            } else {
                resetForm();
            }
        });
    });
    // function showSelected(target) {
    //     let selectElements = document.querySelectorAll('select');
    //     let totalManhour = 0;
    //     selectElements.forEach(function(select) {
    //         let selectedOptions = select.selectedOptions;
    //         if (selectedOptions) {
    //             for (let i = 0; i < selectedOptions.length; i++) {
    //                 let durasi = selectedOptions[i].getAttribute('data-durasi');
    //                 totalManhour += parseFloat(durasi || 0);
    //             }
    //         }
    //         let checkboxName = select.name + '[]';
    //         let checkboxes = document.querySelectorAll('input[name="' + checkboxName + '"]:checked');
    //         if (checkboxes) {
    //             checkboxes.forEach(function(checkbox) {
    //                 let durasi = checkbox.getAttribute('data-durasi');
    //                 totalManhour += parseFloat(durasi || 0);
    //             });
    //         }
    //     });
    //     let totalHourInput = document.getElementById('total_hour');
    //     totalHourInput.value = totalManhour;
    //     let select = document.getElementById(target);
    //     console.log('Select Element:', select);
    //     if (select) {
    //         let selectedOptions = select.selectedOptions;
    //         let totalDurasi = 0;
    //         if (selectedOptions) {
    //             for (let i = 0; i < selectedOptions.length; i++) {
    //                 let selectedDurasi = selectedOptions[i].getAttribute('data-durasi');
    //                 totalDurasi += parseFloat(selectedDurasi || 0);
    //             }
    //         }
    //         let checkboxName = select.name + '[]';
    //         let checkboxes = document.querySelectorAll('input[name="' + checkboxName + '"]:checked');
    //         if (checkboxes) {
    //             checkboxes.forEach(function(checkbox) {
    //                 let selectedDurasi = checkbox.getAttribute('data-durasi');
    //                 console.log('Selected Durasi:', selectedDurasi);
    //                 totalDurasi += parseFloat(selectedDurasi || 0);
    //             });
    //         }
    //         let selectedInfo = document.getElementById("selectedInfo_" + target);
    //         console.log('Selected Info Element:', selectedInfo);
    //         if (selectedInfo) {
    //             selectedInfo.textContent = " - Total Durasi Manhour: " + totalDurasi;
    //         }
    //         console.log(selectedInfo);
    //         console.log(totalDurasi);
    //     }
    // }
    // function showSelected(target) {
    //     let selectElements = document.querySelectorAll('select');
    //     let checkboxElements = document.querySelectorAll('input[type="checkbox"]');
    //     let totalSelectManhour = 0;
    //     let totalCheckboxManhour = 0;

    //     // Pengambilan data dari elemen select
    //     selectElements.forEach(function(select) {
    //         let selectedOption = select.options[select.selectedIndex];
    //         let durasi = selectedOption.getAttribute('data-durasi');
    //         totalSelectManhour += parseFloat(durasi || 0);
    //     });

    //     // Pengambilan data dari elemen checkbox
    //     checkboxElements.forEach(function(checkbox) {
    //         if (checkbox.checked) {
    //             let durasi = checkbox.getAttribute('data-durasi');
    //             totalCheckboxManhour += parseFloat(durasi || 0);
    //         }
    //     });


    //     let selectedInfo = document.getElementById("selectedInfo_" + target);
    //     selectedInfo.textContent = " - Total Durasi Manhour: " + totalCheckboxManhour;
    //     let totalManhour = totalSelectManhour + totalCheckboxManhour;

    //     let totalHourInput = document.getElementById('total_hour');
    //     totalHourInput.value = totalManhour;
    // }
    // function showSelected(target) {
    // let select = document.getElementById(target);
    // let selectedOption = select.options[select.selectedIndex];
    // let selectedDurasi = selectedOption.getAttribute('data-durasi');
    // let selectedInfoSelect = document.getElementById("selectedInfoSelect_" + target);
    // selectedInfoSelect.textContent = " - Durasi Manhour: " + selectedDurasi;
    // let selectElements = document.querySelectorAll('select');
    // let totalManhour = 0;
    // selectElements.forEach(function(select) {
    //     let selectedOption = select.options[select.selectedIndex];
    //     let durasi = selectedOption.getAttribute('data-durasi');
    //     // console.log('Durasi', durasi);
    //     totalManhour += parseFloat(durasi || 0); // Mengonversi ke angka
    // });
    // // console.log('Total Manhour:', totalManhour);
    // let totalHourInput = document.getElementById('total_hour');
    // totalHourInput.value = totalManhour;

    // let checkboxElements = document.querySelectorAll('input[type="checkbox"]');
    // let totalManhour = 0;


    // checkboxElements.forEach(function(checkbox) {
    //     if (checkbox.checked) {
    //         let durasi = parseFloat(checkbox.getAttribute('data-durasi') || 0);

    //         totalManhour += durasi;
    //         let selectedInfoCheckbox = document.getElementById("selectedInfoCheckbox_" + target);
    //         selectedInfoCheckbox.textContent = " - Durasi Manhour: " + durasi;
    //     }
    // });

    // let totalHourInput = document.getElementById('total_hour');
    // totalHourInput.value = totalManhour;
    // }

    function showSelected(target) {
        let selectElements = document.querySelectorAll('select');
        let totalManhour = 0;
        selectElements.forEach(function(select) {
            let selectedOptions = Array.from(select.selectedOptions);
            selectedOptions.forEach(function(selectedOption) {
                let durasi = selectedOption.getAttribute('data-durasi');
                totalManhour += parseFloat(durasi || 0);
            });
        });
        let totalHourInput = document.getElementById('total_hour');
        totalHourInput.value = totalManhour;
        let select = document.getElementById(target);
        console.log('Select Element:', select);
        let selectedOptions = Array.from(select.selectedOptions);
        let totalDurasi = 0;
        selectedOptions.forEach(function(selectedOption) {
            let selectedDurasi = selectedOption.getAttribute('data-durasi');
            totalDurasi += parseFloat(selectedDurasi || 0);
        });
        let selectedInfo = document.getElementById("selectedInfo_" + target);
        console.log('Selected Info Element:', selectedInfo);
        selectedInfo.textContent = " - Total Durasi Manhour: " + totalDurasi;
        console.log(selectedInfo);
        console.log(totalDurasi);
    }
    // function showSelected(target) {
    //     let selectElements = document.querySelectorAll('select');
    //     let checkboxElements = document.querySelectorAll('input[type="checkbox"]');
    //     let totalSelectManhour = 0;
    //     let totalCheckboxManhour = 0;

    //     // Pengambilan data dari elemen select
    //     selectElements.forEach(function(select) {
    //         let selectedOptions = select.selectedOptions;
    //         for (let i = 0; i < selectedOptions.length; i++) {
    //             let durasi = selectedOptions[i].getAttribute('data-durasi');
    //             totalSelectManhour += parseFloat(durasi || 0);
    //         }
    //     });

    //     // Pengambilan data dari elemen checkbox
    //     checkboxElements.forEach(function(checkbox) {
    //         if (checkbox.checked) {
    //             let durasi = checkbox.getAttribute('data-durasi');
    //             totalCheckboxManhour += parseFloat(durasi || 0);
    //         }
    //     });

    //     let totalManhour = totalSelectManhour + totalCheckboxManhour;

    //     // Menampilkan informasi dalam elemen "selectedInfo"
    //     let selectedInfo = document.getElementById("selectedInfo_" + target);
    //     selectedInfo.textContent = " - Total Durasi Manhour: " + totalManhour;
    //     let selectedInfo = document.getElementById("selectedInfo_" + target);
    //     selectedInfo.textContent = " - Total Durasi Manhour: " + totalManhour;

    //     // Menampilkan total durasi pada input "total_hour"
    //     let totalHourInput = document.getElementById('total_hour');
    //     totalHourInput.value = totalManhour;
    // }


    function displayTotalJamCoilMaking() {
        let selectElements = document.querySelectorAll('select');
        let totalJam = 0;
        let workcenterInfo = {};
        selectElements.forEach(function(select) {
            let selectedOptions = Array.from(select.selectedOptions);
            selectedOptions.forEach(function(selectedOption) {
                let durasi = parseFloat(selectedOption.getAttribute('data-durasi')) || 0;
                let workCenterAttr = selectedOption.getAttribute('data-workcenter');
                if (workCenterAttr === 'COIL MAKING') {
                    totalJam += durasi;
                    if (!workcenterInfo[workCenterAttr]) {
                        workcenterInfo[workCenterAttr] = durasi;
                    } else {
                        workcenterInfo[workCenterAttr] += durasi;
                    }
                }
            });
        });
        console.log("Work Center (COIL MAKING):", workcenterInfo);
        let totalJamElement = document.getElementById("totalJam_value");
        if (totalJamElement) {
            totalJamElement.textContent = totalJam;
        }
    }

    function displayTotalJamMouldCasting() {
        let selectElements = document.querySelectorAll('select');
        let totalJam = 0;
        let workcenterInfo = {};
        selectElements.forEach(function(select) {
            let selectedOptions = Array.from(select.selectedOptions);
            selectedOptions.forEach(function(selectedOption) {
                let durasi = parseFloat(selectedOption.getAttribute('data-durasi')) || 0;
                let workCenterAttr = selectedOption.getAttribute('data-workcenter');
                if (workCenterAttr === 'MOULD & CASTING') {
                    totalJam += durasi;
                    if (!workcenterInfo[workCenterAttr]) {
                        workcenterInfo[workCenterAttr] = durasi;
                    } else {
                        workcenterInfo[workCenterAttr] += durasi;
                    }
                }
            });
        });
        console.log("Work Center (MOULD & CASTING):", workcenterInfo);
        let totalJamElement = document.getElementById("totalMouldCasting_value");
        if (totalJamElement) {
            totalJamElement.textContent = totalJam;
        }
    }

    function displayTotalJamCoreCoilAssembly() {
        let selectElements = document.querySelectorAll('select');
        let totalJam = 0;
        let workcenterInfo = {};
        selectElements.forEach(function(select) {
            let selectedOptions = Array.from(select.selectedOptions);
            selectedOptions.forEach(function(selectedOption) {
                let durasi = parseFloat(selectedOption.getAttribute('data-durasi')) || 0;
                let workCenterAttr = selectedOption.getAttribute('data-workcenter');
                if (workCenterAttr === 'CORE COIL ASSEMBLY') {
                    totalJam += durasi;
                    if (!workcenterInfo[workCenterAttr]) {
                        workcenterInfo[workCenterAttr] = durasi;
                    } else {
                        workcenterInfo[workCenterAttr] += durasi;
                    }
                }
            });
        });
        console.log("Work Center (CORE COIL ASSEMBLY):", workcenterInfo);
        let totalJamElement = document.getElementById("totalCoreCoilAssembly_value");
        if (totalJamElement) {
            totalJamElement.textContent = totalJam;
        }
    }

    function displayTotalJamQCTest() {
        let selectElements = document.querySelectorAll('select');
        let totalJam = 0;
        let workcenterInfo = {};
        selectElements.forEach(function(select) {
            let selectedOptions = Array.from(select.selectedOptions);
            selectedOptions.forEach(function(selectedOption) {
                let durasi = parseFloat(selectedOption.getAttribute('data-durasi')) || 0;
                let workCenterAttr = selectedOption.getAttribute('data-workcenter');
                if (workCenterAttr === 'QC TEST') {
                    totalJam += durasi;
                    if (!workcenterInfo[workCenterAttr]) {
                        workcenterInfo[workCenterAttr] = durasi;
                    } else {
                        workcenterInfo[workCenterAttr] += durasi;
                    }
                }
            });
        });
        console.log("Work Center (QC TEST):", workcenterInfo);
        let totalJamElement = document.getElementById("totalQCTest_value");
        if (totalJamElement) {
            totalJamElement.textContent = totalJam;
        }
    }
    document.querySelectorAll('select').forEach(function(select) {
        select.addEventListener('change', function() {
            let selectedOption = select.options[select.selectedIndex];
            let workCenter = selectedOption.getAttribute('data-workcenter');
            if (workCenter === 'COIL MAKING') {
                displayTotalJamCoilMaking();
            } else if (workCenter === 'MOULD & CASTING') {
                displayTotalJamMouldCasting();
            } else if (workCenter === 'CORE COIL ASSEMBLY') {
                displayTotalJamCoreCoilAssembly();
            } else if (workCenter === 'QC TEST') {
                displayTotalJamQCTest();
            }
        });
    });
</script>

</html>
