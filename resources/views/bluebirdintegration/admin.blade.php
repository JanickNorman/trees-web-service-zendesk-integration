
<html>
  <body>
    @unless (!$error)
      <div class="alert alert-danger">
        {{ $error }}
      </div>
    @endunless
    <div class="panel panel-default">
      <div class="panel-heading">BlueBird Channel Account Settings</div>
      <div class="panel-body">
        <form id="account-form" method="post" action="{{$return_url}}">
          <div class="form-group">
            <label for="name">Name:</label>
            <input class="form-control" type="text" name="name" value="{{$line_channel_name}}">
          </div>
          <div class="form-group">
            <label for="channel_id">Channel ID:</label>
            <input class="form-control" type="text" name="line_channel_id" value="{{$line_channel_id}}">
          </div>
          {{-- <input type="hidden" name="subdomain" value="{{$line_channel_id}}" />
          <input type="hidden" name="locale" value="{{$locale}}" />
          <input type="hidden" name="return_url" value="{{$return_url}}" />
          <input type="hidden" name="type" value="{{$type}}" /> --}}
          <input type="hidden" name="metadata" value="{{json_encode($metadata)}}" />
          <input type="hidden" name="name" value="BBtes">
          <input type="hidden" name="state" value="{}">
          <input class="btn btn-default" type="submit" value="Submit"/>
        </form>
      </div>
    </body>
  </div>
</html>
