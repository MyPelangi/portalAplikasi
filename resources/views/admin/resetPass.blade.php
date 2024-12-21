<div class="modal fade @if(session('openModal') === 'resetPasswordModal{{ $id }}') show @endif"
    id="resetPasswordModal{{ $id }}"
    tabindex="-1"
    aria-labelledby="resetPasswordLabel{{ $id }}"
    aria-hidden="true"
    style="@if(session('openModal') === 'resetPasswordModal{{ $id }}') display: block; @endif">
   <div class="modal-dialog">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="resetPasswordLabel{{ $id }}">Reset Password</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-regular fa-circle-xmark"></i></button>
            </div>
           <form action="{{ route('users.resetPassword', $id) }}" method="POST">
               @csrf
               <div class="modal-body">
                   <p>Apakah Anda yakin ingin mereset password untuk pengguna <strong>{{ $name }}</strong>?</p>
                   <div class="form-group">
                       <label for="passwordbaru{{ $id }}">Password Baru</label>
                       <input type="password" name="passwordbaru" id="passwordbaru{{ $id }}" class="form-control @error('passwordbaru') is-invalid @enderror" placeholder="Masukkan password baru">
                       <i class="fa fa-eye password-show"></i>
                       @error('passwordbaru')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                   </div>
                   <div class="form-group mt-3">
                       <label for="passwordbaru_confirmation{{ $id }}">Konfirmasi Password</label>
                       <input type="password" name="passwordbaru_confirmation" id="passwordbaru_confirmation{{ $id }}" class="form-control @error('passwordbaru_confirmation') is-invalid @enderror" placeholder="Konfirmasi password baru">
                       <i class="fa fa-eye password-show"></i>
                            @error('passwordbaru_confirmation')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                   </div>
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                   <button type="submit" class="btn btn-primary">Reset Password</button>
               </div>
           </form>
       </div>
   </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(function() {
        $(".password-show").click(function(event) {
            // Cari input yang berada di dalam grup yang sama
            const input = $(this).siblings(".form-control");

            // Toggle type antara password dan text
            const type = input.attr("type") === "password" ? "text" : "password";
            input.attr("type", type);

            // Toggle antara ikon fa-eye dan fa-eye-slash
            $(this).toggleClass('fa-eye fa-eye-slash');
        });
    });
</script>
