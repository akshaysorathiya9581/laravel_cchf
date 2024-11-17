@extends('admin.layout')
@section('title', ' Custom Code')

@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Custom Code for => {{ $campaign->camp_title }}</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="#" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted"> Custom Code</li>

                    </ul>
                </div>

            </div>
        </div>
        <div id="kt_app_contentss" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card card-flush">
                  <form action="" id="editorForm" method="post">
                      
                      <div class="card-body p-4 shadow">
                          {{-- <div id="editor" style="width: 100%; height: 100vh;"></div> --}}
                          <div id="editor" style="height: 500px; width: 100%;"></div>
                          <button class="mt-3 btn btn-primary EditCustomCode" data-route="{{ route('admin.updateCustomCode') }}" data-id="{{ $campaign->id }}" type="button">Update</button>                        
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.15.0/ace.js"></script>

<script>
    
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/monokai");
    editor.session.setMode("ace/mode/javascript");
</script>

<script>
    $('.EditCustomCode').on('click', function() {
        let campaign_id = $(this).data('id')
        let action = $(this).data('route')
        let editorContent = editor.getValue()
        let data = {
            'campaign_id': campaign_id,
            'content':editorContent,
            '_token': '{{ csrf_token() }}'
            }
        // alert(data)
        ajaxCall(
            action, 'POST', data
            , function(response) {
                alert('done');
                // let data =  JSON.stringify(response)
                // console.log(data)
              
            }
            , function(xhr, status, error) {
                 console.error('Error:', error);
                 let errorMessage = 'An error occurred. Please try again.';
                 if (xhr.responseJSON && xhr.responseJSON.messages) {
                     errorMessage = '<ul>';
                     $.each(xhr.responseJSON.messages, function(key, messages) {
                         $.each(messages, function(index, message) {
                             errorMessage += '<li>' + message + '</li>';
                         });
                     });
                     errorMessage += '</ul>';
                 }
                 Swal.fire({
                     html: errorMessage
                     , icon: 'error'
                     , buttonsStyling: false
                     , confirmButtonText: "Ok, got it!"
                     , customClass: {
                         confirmButton: "btn btn-light-primary"
                     }
                 });
             }
        );



    })

</script>

@endsection
