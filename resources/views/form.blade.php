@extends('layouts.app')

@section('content')
<div class="container">


        @foreach ($NonUsers as $User)
        <div class="row ">
        <div class="col-md-4">

            <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title" style="text-transform:capitalize">{{$User->name}}</h5>

                  {{-- <form action="">
                    @csrf --}}
                  {{-- <input type="text" class="form-control" placeholder="type message to {{$User->name}}" name="message" id="message" value=""> --}}
                  {{-- </form> --}}
                    
                    

                    <button class="btn btn-success btn-sm" onclick="sendMessage({{$User->id}})">Click To send message</button>
                </div>
            </div> 
        </div>
        @endforeach
       
            

    
</div>
@endsection

@section('script')

<script>
      

   
    function sendMessage($id)
    {   

        var userId = $id;
        let url = "{{ route('fire') }}";
   
        let gettext = document.querySelector('#message');



        let activeuserid = `{{auth()->user()->id}}`
        activeusertext = "This message is from the user with id-"+userId;
           

        
        var formData = new FormData();
        let token = "{{ csrf_token() }}";
                
       formData.append('userid',userId)
       formData.append('_token',token)
       formData.append('activeuser',activeusertext)

    //    console.log(formData)


    

        $.ajax({
                   url: url,
                   type: 'POST',
                   data: formData,
                    processData: false,
                    contentType: false,
                   dataType: 'JSON',
                   success: function (response) {
                       console.log(response);
                   }
                  
                });
    }
</script>
    
@endsection