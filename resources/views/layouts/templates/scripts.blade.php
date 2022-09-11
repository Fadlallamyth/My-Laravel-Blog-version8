<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('js/sweetalert2@11.js') }}"></script>
<script src="{{ asset('js/confirm.js') }}"></script>
<script type="text/javascript" src="/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="/js/tinymce/ar.js"></script>
<script src="{{ asset('js/js.js') }}"></script>
<script>
    document.documentElement.style.setProperty('--animate-duration', '0.2s');
</script>

{{-- @if (Session::get('published_success'))
<div>
<script>
    Swal.fire({
        position: 'bottom-start',
        title: ' تم نشر المشاركة',
        showClass: {
            popup: 'animate__animated animate__fadeInUp'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutDown'
        },
        showConfirmButton: false,
        timer: 2000
    })
</script>
</div>
@endif
 --}}
{{-- @if (Session::get('drafted_success'))
<div>
<script>
    Swal.fire({
        position: 'bottom-start',
        title: 'العودة إلى المسودة',
        showClass: {
            popup: 'animate__animated animate__fadeInUp'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutDown'
        },
        showConfirmButton: false,
        timer: 2000
    })
</script>
</div>
@endif --}}