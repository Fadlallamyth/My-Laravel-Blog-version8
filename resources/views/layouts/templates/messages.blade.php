@if (session()->has('common_message_back_to_draft'))
    @push('scripts')
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
                backdrop : false,
                timer: 1500
            })
        </script>
    @endpush
    {{ session()->forget('published_success') }}
    {{ Session()->save('published_success') }}
@endif
@if (session()->has('updated_changed'))
    @push('scripts')
        <script>
            Swal.fire({
                position: 'bottom-start',
                title: 'تم حفظ التغييرات',
                showClass: {
                    popup: 'animate__animated animate__fadeInUp'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutDown'
                },
                showConfirmButton: false,
                backdrop : false,
                timer: 155500
            })
        </script>
    @endpush
    {{ session()->forget('published_success') }}
    {{ Session()->save('published_success') }}
@endif
{{-- published_success --}}
{{-- published_success --}}
{{-- published_success --}}
{{-- published_success --}}
{{-- published_success --}}
@if (session()->has('published_success'))
    @push('scripts')
        <script>
            Swal.fire({
                position: 'bottom-start',
                title: 'تم نشر المشاركة بنجاح',
                backdrop : false,
                showClass: {
                    popup: 'animate__animated animate__fadeInUp'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutDown'
                },
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endpush
    {{ session()->forget('published_success') }}
    {{ Session()->save('published_success') }}
@endif
{{-- published_draft --}}
{{-- published_draft --}}
{{-- published_draft --}}
{{-- published_draft --}}
{{-- published_draft --}}
@if (session()->has('published_draft'))
    @push('scripts')
        <script>
            Swal.fire({
                position: 'bottom-start',
                title: 'تم حفظ المشاركة كمسودة',
                showClass: {
                    popup: 'animate__animated animate__fadeInUp'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutDown'
                },
                showConfirmButton: false,
                backdrop : false,
                timer: 1500
            })
        </script>
    @endpush
    {{ session()->forget('published_draft') }}
    {{ Session()->save('published_draft') }}
@endif
{{-- category publish --}}
{{-- category publish --}}
{{-- category publish --}}
{{-- category publish --}}
{{-- category publish --}}
{{-- category publish --}}
{{-- category publish --}}
{{-- category publish --}}
@if (session()->has('category_publish'))
    @push('scripts')
        <script>
            Swal.fire({
                position: 'bottom-start',
                title: 'تم اضافة التصنيف',
                showClass: {
                    popup: 'animate__animated animate__fadeInUp'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutDown'
                },
                showConfirmButton: false,
                backdrop : false,
                timer: 1500
            })
        </script>
    @endpush
    {{ session()->forget('category_publish') }}
    {{ Session()->save('category_publish') }}
@endif
{{-- error_category_publish --}}
{{-- error_category_publish --}}
{{-- error_category_publish --}}
{{-- error_category_publish --}}
{{-- error_category_publish --}}
{{-- error_category_publish --}}
{{-- error_category_publish --}}
@if (session()->has('error_category_publish'))
    @push('scripts')
        <script>
            Swal.fire({
                position: 'bottom-start',
                title: 'فشل في اضافة التصنيف',
                showClass: {
                    popup: 'animate__animated animate__fadeInUp'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutDown'
                },
                showConfirmButton: false,
                backdrop : false,
                timer: 1500
            })
        </script>
    @endpush
    {{ session()->forget('category_publish') }}
    {{ Session()->save('category_publish') }}
@endif
@if (session()->has('category_exists'))
    @push('scripts')
        <script>
            Swal.fire({
                position: 'bottom-start',
                title: 'التصنيف موجود',
                showClass: {
                    popup: 'animate__animated animate__fadeInUp'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutDown'
                },
                showConfirmButton: false,
                backdrop : false,
                timer: 1500
            })
        </script>
    @endpush
    {{ session()->forget('category_exists') }}
    {{ Session()->save('category_exists') }}
@endif
@if (session()->has('category_url_exists'))
    @push('scripts')
        <script>
            Swal.fire({
                position: 'bottom-start',
                title: 'url موجود',
                showClass: {
                    popup: 'animate__animated animate__fadeInUp'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutDown'
                },
                showConfirmButton: false,
                backdrop : false,
                timer: 1500
            })
        </script>
    @endpush
    {{ session()->forget('category_url_exists') }}
    {{ Session()->save('category_url_exists') }}
@endif


{{-- Pages messages --}} {{-- Pages messages --}}
{{-- Pages messages --}} {{-- Pages messages --}} 
{{-- Pages messages --}} {{-- Pages messages --}}
{{-- Pages messages --}} {{-- Pages messages --}}
{{-- Pages messages --}} {{-- Pages messages --}}
{{-- Pages messages --}} {{-- Pages messages --}}
{{-- Pages messages --}} {{-- Pages messages --}}
{{-- Pages messages --}} {{-- Pages messages --}}
{{-- Pages messages --}} {{-- Pages messages --}}
{{-- Pages messages --}} {{-- Pages messages --}}
{{-- Pages messages --}} {{-- Pages messages --}}

@if (session()->has('page_added'))
    @push('scripts')
        <script>
            Swal.fire({
                position: 'bottom-start',
                title: 'تم نشر الصفحة',
                showClass: {
                    popup: 'animate__animated animate__fadeInUp'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutDown'
                },
                showConfirmButton: false,
                backdrop : false,
                timer: 1500
            })
        </script>
    @endpush
    {{ session()->forget('page_added') }}
    {{ Session()->save('page_added') }}
@endif

@if (session()->has('page_as_draft'))
    @push('scripts')
        <script>
            Swal.fire({
                position: 'bottom-start',
                title: 'تم حفظ الصفحة كمسودة',
                showClass: {
                    popup: 'animate__animated animate__fadeInUp'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutDown'
                },
                showConfirmButton: false,
                backdrop : false,
                timer: 1500
            })
        </script>
    @endpush
    {{ session()->forget('page_as_draft') }}
    {{ Session()->save('page_as_draft') }}
@endif