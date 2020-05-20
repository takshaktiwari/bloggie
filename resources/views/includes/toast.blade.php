@if ($errors->any())
	<audio src="{{ url('assets/notification.mp3') }}" autoplay></audio>
	<div class="toast front_toast" data-autohide="false">
	    <div class="toast-header bg-danger text-white py-2">
	        <strong class="mr-auto ">Notification</strong>
	        <small class="">Now</small>
	        <button type="button" class="ml-2 mb-1 close text-white" data-dismiss="toast">
	        	&times;
	        </button>
	    </div>
	    <div class="toast-body">
	        <ul class="mb-0">
	            @foreach ($errors->all() as $error)
	                <li class="text-danger">{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	</div>
@endif