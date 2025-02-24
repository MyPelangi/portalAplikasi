

const MyApp = {
    // Menampilkan/mengubah inputan password
    initPasswordToggle: function () {
        $(document).on("click", ".password-show, .passwordshow", function () {
            const input = $(this).siblings(".form-control").length
                ? $(this).siblings(".form-control")
                : $("#password");
            const type = input.attr("type") === "password" ? "text" : "password";
            input.attr("type", type);
            $(this).toggleClass('fa-eye fa-eye-slash');
        });
    },

    // Mengambil captcha baru
    initCaptchaReload: function () {
        $(document).on("click", "#reload", function () {
            $.ajax({
                type: 'GET',
                url: 'reload-captcha',
                success: function (data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
    },

    // Scrollbar custom
    initScrollbar: function () {
        const container = document.querySelector('.wrapper');
        if (container) {
            new PerfectScrollbar(container, {
                wheelSpeed: 1,
                wheelPropagation: true,
                minScrollbarLength: 20,
            });
        }
    },

    // Toggle sidebar
    initSidebarToggle: function () {
        const toggleButton = document.getElementById('sidebar-toggle');
        const body = document.body;
        if (toggleButton) {
            toggleButton.addEventListener('click', function () {
                body.classList.toggle('nav-open');
                toggleButton.classList.toggle('toggled');
            });
        }
    },

    // Inisialisasi DataTables
    initDataTable: function () {
        if ($.fn.DataTable.isDataTable('#example')) {
            $('#example').DataTable().ajax.reload();
            $('#example').DataTable().destroy();
            $('#example').empty(); // Kosongkan isi tabel sebelum inisialisasi ulang
        }
        $('#example').DataTable({
            processing: true,
            serverSide: true,
            ajax: window.routeDaftarUserIndex,
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', className: 'text-center', orderable: false, searchable: false },
                { data: 'nama_email', name: 'nama_email' },
                { data: 'name_id', name: 'name_id' },
                { data: 'cabang', name: 'cabang', className: 'text-center' },
                { data: 'bidang', name: 'bidang', className: 'text-center' },
                { data: 'action', name: 'action', className: 'text-center', orderable: false, searchable: false },
            ],
            scrollX: true,
            responsive: true,
        });
    },

    // Menampilkan modal popup
    initModalPopup: function () {
        if (window.errorsExist) {
            if (window.openModal && window.openModal.startsWith('resetPasswordModal')) {
                const resetPasswordModal = new bootstrap.Modal(document.getElementById(window.openModal));
                resetPasswordModal.show();
            } else if (window.openModal === 'tambahUserModal') {
                const tambahUserModal = new bootstrap.Modal(document.getElementById('tambahUserModal'));
                tambahUserModal.show();
            }
        }
    },

    // Dropdown keterangan akun
    initDropdown: function () {
        const dropdownElementList = document.querySelectorAll('.dropdown-toggle');
        dropdownElementList.forEach(function (dropdownToggleEl) {
            new bootstrap.Dropdown(dropdownToggleEl);
        });
    },

    // Inisialisasi DataTables untuk Activity Log
    initDataTableActivitylog: function () {
        // Inisialisasi Datepicker
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });

        if ($.fn.DataTable.isDataTable('#activitylog')) {
            $('#activitylog').DataTable().destroy();
            $('#activitylog').empty();
        }
        $('#activitylog').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: window.activityLogRoute,
                data: function (d) {
                    d.start_date = $('#start_date').val();
                    d.end_date = $('#end_date').val();
                    d.nama_pegawai = $('#nama_pegawai').val();
                    d.nama_cabang = $('#nama_cabang').val();
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', className: 'text-center', searchable: false },
                { data: 'id_user', name: 'id_user', className: 'text-center' },
                { data: 'nip', name: 'nip', className: 'text-center' },
                { data: 'nama_pegawai', name: 'nama_pegawai' },
                { data: 'kode_cabang', name: 'kode_cabang', className: 'text-center' },
                { data: 'cabang', name: 'cabang', className: 'text-center' },
                { data: 'type', name: 'type', className: 'text-center' },
                { data: 'ip_user', name: 'ip_user', className: 'text-center' },
                { data: 'latitude', name: 'latitude', className: 'text-center' },
                { data: 'longitude', name: 'longitude', className: 'text-center' },
                { data: 'created_at', name: 'created_at', className: 'text-center' },
            ],
            scrollX: true,
            responsive: true,
        });

        $('#search').click(function () {
            $('#activitylog').DataTable().ajax.reload();
        });

        // Event tombol Reset
        $('#reset').click(function () {
            $('#start_date').val('');
            $('#end_date').val('');
            $('#nama_pegawai').val('');
            $('#nama_cabang').val('');
            $('#activitylog').DataTable().ajax.reload();
        });
    },

    // Fungsi utama untuk inisialisasi semua fitur
    init: function () {
        this.initPasswordToggle();
        this.initCaptchaReload();
        this.initScrollbar();
        this.initSidebarToggle();
        this.initDataTable();
        this.initModalPopup();
        this.initDropdown();
        this.initDataTableActivitylog();
    }
};

// Jalankan semua fitur setelah DOM selesai dimuat
document.addEventListener('DOMContentLoaded', function () {
    MyApp.init();
});

document.addEventListener("DOMContentLoaded", function () {
    // Pastikan variabel tersedia
    if (typeof Labels === "undefined" || typeof Values === "undefined") {
        console.error("Data chart tidak tersedia.");
        return;
    }

    const ctx = document.getElementById('loginChart');

    if (ctx) {
        new Chart(ctx.getContext('2d'), {
            type: 'line',
            data: {
                labels: Labels,
                datasets: [{
                    label: 'Jumlah Activity Log',
                    data: Values,
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    } else {
        console.error("Canvas dengan ID 'loginChart' tidak ditemukan.");
    }
});


