@if(session("success"))
<div class="alert alert-success d-flex align-items-center" role="alert">
    <div>
      {{ session("success") }}
    </div>
</div>
@endif