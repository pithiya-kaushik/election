@extends('website.layout.main')
@section('content') 
<form method="get" action="{{ route('location') }}">
	<div class="col-md-4">
	  <a href="{{ route('result') }}" class="logo d-flex align-items-center">
          <button  type="button" class="btn btn-primary candidate-vote-btn" style="margin-left: 360%">Result</button>
      </a>
	  <label for="inputState" class="form-label">Location</label>
	  <select id="inputState" name="location_id" class="form-select">
	    @foreach ( $locations as $location)
	    <option value="{{ $location->id }}">{{ $location->name }}</option>
	    @endforeach
	  </select>
	</div>
	<div style="margin-top: 5px">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
<div class="row" style="margin-top: 30px;">
	@foreach ($elections as $election)
		<div class="col-xxl-3 col-md-6 cards mb-5">
		  	<div class="card info-card sales-card">
			    <div class="card-body">
			      <h5 class="card-title">{{ $election->pname }}</h5>
			      <div class="d-flex align-items-center">
			        <div class="ps-3">
			          <h6>{{ $election->uname }}</h6>
			          <span class="text-success small pt-1 fw-bold">{{ $election->lname }}</span>
			        </div>
			      </div>
			    </div>
		  	</div>
			<button type="button" data-id="{{ $election->id }}" class="btn btn-primary btnTest" data-toggle="modal" data-target="#exampleModalCenter">
			  vote
			</button>
		</div>	
	@endforeach
</div>
<!-- Modal -->
<div class="modal fade" id="candidate-vote-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Voter No</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="candidate-vote-form">
      	  {{ csrf_field() }}	
	      <div class="modal-body">
	       	<input type="hidden" name="candidate_id" id="candidate_id">
	        <input type="text" name="voter_no" required placeholder="Enter your voter number" class="form-control voter" id="voterNo">
	        <span id="voter_no_error" class="valiation-error text-danger"></span>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary candidate-vote-btn">Vote now</button>
	      </div>
	  </form>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
	$('document').ready(function() {
		$('.close').click(function() {
		 	$('#candidate-vote-modal').modal('hide');
		});

	  	$('.btnTest').click(function() {
	  		$("#candidate-vote-modal").find("#candidate_id").val($(this).data("id"));
	    	$('#candidate-vote-modal').modal('show');
	  	});
	  	
	  	$('.candidate-vote-btn').click(function() {
	    	
		    var form = $(this).closest("#candidate-vote-form");

		  	$.ajax({
			    type : 'POST',
			    url : "{{ route('vote') }}",
			    data : form.serialize(),
			    dataType: "json",
			    encode: true,
			    success: function(data, textStatus, jqXHR) {
	              if (data.success == true) {
	                alert(data.message);
	              }
	            },
	            error: function(reject) {
	              if (reject.status === 422) {
	                var errors = reject.responseJSON.errors;
	                $.each(errors, function(key, val) {
	                  $("#" + key + "_error").text(val[0]);
	                });
	              }
	            }
    		}); 
	  	});
	});
	
</script>

@endsection