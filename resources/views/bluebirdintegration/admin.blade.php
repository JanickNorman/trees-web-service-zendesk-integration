
<html>
  <body>
    @unless (!$error)
      <div class="alert alert-danger">
        {{ $error }}
      </div>
    @endunless
    <div class="panel panel-default">
      <div class="panel-heading">Line Channel Account Settings</div>
      <div class="panel-body">
        <form id="account-form" method="post" action="/integration/line/send_reply_url">
          <div class="form-group">
            <label for="name">Name:</label>
            <input class="form-control" type="text" name="name" value="{{$line_channel_name}}">
          </div>
          <div class="form-group">
            <label for="channel_id">Channel ID:</label>
            <input class="form-control" type="text" name="line_channel_id" value="{{$line_channel_id}}">
          </div>
          <div class="form-group">
            <label for="channel_id">Channel Secret:</label>
            <input class="form-control" type="text" name="line_channel_secret" value="{{$line_channel_secret}}">
          </div>
          <div class="form-group">
            <label for="channel_id">Channel Access Token:</label>
            <input class="form-control" type="text" name="line_channel_access_token" value="{{$line_channel_access_token}}">
          </div>
          <input type="hidden" name="subdomain" value="{{$line_channel_id}}" />
          <input type="hidden" name="locale" value="{{$locale}}" />
          <input type="hidden" name="return_url" value="{{$return_url}}" />
          <input type="hidden" name="type" value="{{$type}}" />
          <input type="hidden" name="instance_push_id" value="{{$instance_push_id}}" />
          <input type="hidden" name="zendesk_access_token" value="{{$zendesk_access_token}}" />
          <input class="btn btn-default" type="submit" value="Submit"/>
        </form>
      </div>
    </body>
  </div>
</html>
