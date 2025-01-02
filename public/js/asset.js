const MyApp = {
    // Menampilkan/mengubah inputan password
    initPasswordToggle: function () {
        $(function () {
            $(".password-show, .passwordshow").click(function (event) {
                const input = $(this).siblings(".form-control").length
                    ? $(this).siblings(".form-control")
                    : $("#password");
                const type = input.attr("type") === "password" ? "text" : "password";
                input.attr("type", type);
                $(this).toggleClass('fa-eye fa-eye-slash');
            });
        });
    },

    // Mengambil captcha baru
    initCaptchaReload: function () {
        $(document).ready(function () {
            const reloadButton = $('#reload');
            if (reloadButton.length) {
                reloadButton.click(function () {
                    $.ajax({
                        type: 'GET',
                        url: 'reload-captcha',
                        success: function (data) {
                            $(".captcha span").html(data.captcha);
                        }
                    });
                });
            }
        });
    },

    // Scrollbar custom
    initScrollbar: function () {
        document.addEventListener("DOMContentLoaded", function () {
            const container = document.querySelector('.wrapper');
            if (container) {
                const ps = new PerfectScrollbar(container, {
                    wheelSpeed: 1,
                    wheelPropagation: true,
                    minScrollbarLength: 20,
                });
            }
        });
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
        if (!$.fn.DataTable.isDataTable('#example')) {
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
        }
    },

    // Menampilkan modal popup
    initModalPopup: function () {
        document.addEventListener('DOMContentLoaded', function () {
            if (window.errorsExist) {
                if (window.openModal && window.openModal.startsWith('resetPasswordModal')) {
                    const resetPasswordModal = new bootstrap.Modal(document.getElementById(window.openModal));
                    resetPasswordModal.show();
                } else if (window.openModal === 'tambahUserModal') {
                    const tambahUserModal = new bootstrap.Modal(document.getElementById('tambahUserModal'));
                    tambahUserModal.show();
                }
            }
        });
    },

    // Dropdown keterangan akun
    initDropdown: function () {
        document.addEventListener("DOMContentLoaded", function () {
            const dropdownElementList = document.querySelectorAll('.dropdown-toggle');
            if (dropdownElementList.length > 0) {
                [].slice.call(dropdownElementList).map(function (dropdownToggleEl) {
                    return new bootstrap.Dropdown(dropdownToggleEl);
                });
            }
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
    }
};

// Jalankan semua fitur setelah DOM selesai dimuat
document.addEventListener('DOMContentLoaded', function () {
    MyApp.init();
});
