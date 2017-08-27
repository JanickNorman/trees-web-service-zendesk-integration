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

      //sementara aja
      $data['bb_portal'] = "https://BB_Sementara.portal.com";
      $data['bb_secret'] = "inirahasia";

      $data['trees_web_service'] = "https://trees-web-service.herokuapp.com";


      return view('bluebirdintegration.admin', $data);
      // @name = integration_params[:name]
      // @instance_push_id = integration_params[:instance_push_id]

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

    public function send_reply_url() {

    }


}
