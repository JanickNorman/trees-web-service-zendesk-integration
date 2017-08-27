<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlueBirdIntegrationController extends Controller
{
    //
    public function admin(Request $request) {
      echo "TES HALLO";
      $data['name'] = $request->get('name');
      $data['instance_push_id'] = $request->get('instance_push_id');
      $data['zendesk_access_token'] = $request->get('zendesk_access_token');

      $data['metadata'] = $metadata = $request->get('metadata');
      if (! $metadata) {
        $metadata = json_decode($metadata);
        $data['line_channel_name'] = $metadata['line_channel_name'];
        $data['line_channel_id'] = $metadata['line_channel_id'];
        $data['line_channel_secret'] = $metadata['line_channel_secret'];
        $data['line_channel_access_token'] = $metadata['line_channel_access_token'];
        $data['type'] = "update";
      } else {
        $data['type'] = "new";
      }
      $data['state'] = $request->get('state');
      $data['return_url'] = $request->get('return_url');
      $data['subdomain'] = $request->get('subdomain');
      $data['locale'] = $request->get('subdomain');
      $data['error'] = "";

      return view('bluebirdintegration.admin', $data);
      // @name = integration_params[:name]
      // @instance_push_id = integration_params[:instance_push_id]
      // @zendesk_access_token = integration_params[:zendesk_access_token]
      //
      // @metadata = integration_params[:metadata]
      // if !integration_params[:metadata].empty?
      // @metadata = JSON.parse(integration_params[:metadata])
      // @line_channel_id = @metadata['line_channel_id']
      // @line_channel_secret = @metadata['line_channel_secret']
      // @line_channel_access_token = @metadata['line_channel_access_token']
      // @type = "update"
      // else
      // @type = "new"
      // end
      // @state = integration_params[:state]
      // @return_url = integration_params[:return_url]
      // @subdomain = integration_params[:subdomain]
      // @locale = integration_params[:locale]
      // @error = ""
      //
      // respond_to do |format|
      // format.html { render template: "line_integration/admin" }
      // end
    }

    public function tes() {
      echo "HELLO WORLD";
    }

    public function clickthrough() {
      return "clickthrough";
    }

    public function channelback() {

    }

    public function pull() {

    }


}
