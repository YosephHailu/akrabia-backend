{{-- @if(count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="alert  alert-danger col-sm-12">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="text-white" aria-hidden="true">&times;</span></button>
            {{$error}}
        </div>
    @endforeach
@endif --}}

@if (session('success'))
        <div class="alert alert-success  col-sm-12" id = "timer">
            <i class="ni ni-send text-white fa-fw"></i> {{session('success')}}<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="text-white" aria-hidden="true">&times;</span></button>
        </div>
@endif

@if (session('error'))
<div onclick="dismiss()">
    <div class="alert alert-danger  col-sm-12" id = "timer">
        {{session('error')}}<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="text-white" aria-hidden="true">&times;</span></button>
    </div>
</div>
        
@endif

@push('js')
<script type="text/javascript">
setTimeout(function(){
  $('#timer').hide();
},3000);
</script>
    
@endpush