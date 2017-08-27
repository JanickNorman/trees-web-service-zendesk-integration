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

        $data['type'] = "update";
      } else {
        $data['type'] = "new";
      }
      $data['state'] = $request->get('state');
      $data['return_url'] = $request->get('return_url');
      $data['subdomain'] = $request->get('subdomain');
      $data['locale'] = $request->get('subdomain');
      $data['error'] = "";
      $data['metadata'] = [];

      //sementara aja
      $data['metadata']['bb_portal'] = "https://BB_Sementara.portal.com";
      $data['metadata']['bb_secret'] = "inirahasia";

      $data['metadata']['trees_web_service'] = "https://trees-web-service.herokuapp.com";



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

    public function pull(Request $request) {
      \Log::info("zendesk is pulling");
      \Log::info($request->all());
      $response = [
        "external_resources" => [],
        "state" => "",
        "metadata_needs_update" => false,
      ];
      return response()->json($response);

    }

    public function send_reply_url() {

    }


}
