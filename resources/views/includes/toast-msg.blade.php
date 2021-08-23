@if (Session::has('messageSuccess'))
<div class="position-fixed bottom-0 start-50 translate-middle-x" style="z-index: 10002">
  <div class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" id="liveToast" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body">
        {{ Session::get('messageSuccess') }}
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
</div>
{{Session::forget('messageSuccess')}}
@endif
@if (Session::has('messageError'))
<div class="position-fixed bottom-0 start-50 translate-middle-x" style="z-index: 10002">
  <div class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" id="liveToast" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body">
        {{ Session::get('messageError') }}
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
</div>
{{Session::forget('messageError')}}
@endif