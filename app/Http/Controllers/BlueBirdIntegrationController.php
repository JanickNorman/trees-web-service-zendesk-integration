<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

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

    public function clickthrough() {
      return "clickthrough";
    }

    public function channelback() {

    }

    public function pull(Request $request, Client $client) {
      \Log::info("zendesk is pulling");
      \Log::info($request->all());
      //tes
      $state = $request->get('state');
      $state = json_decode($state, true);

      if (isset($state['count'])) {
        $count = (int) $state['count'];
        $count++;
      }else{
        $count = 1;
      }
      \Log::info("hahahaha");

      $res = $client->put('https://trees-web-service.herokuapp.com/api/v1/absences/batch',[
        'json' => [
          'batch_id' => $count
        ]
      ]);      


      $external_resources = [];
      \Log::info("kena");
      \Log::info($res->getStatusCode());
      if ($res->getStatusCode() == 200) {
        $json = (string) $res->getBody();
        $data = json_decode($json, true);
        $absences = $data['updated_absences'];

        $external_resource = [];
        foreach ($absences as $key => $absence) {
          $external_resource['external_id'] = (string) $absence['abs_trx_id'];
          $external_resource['created_at'] = "2015-09-08T22:48:09Z";
          $external_resource['parent_id'] = 2343;
          // $external_resource['thread_id'] = $absence['created_by'];
          $external_resource['message'] = "Absen nih untuk project number: ".(string) $absence['project_number'];

          $author = [];
          $author['external_id'] = $absence["employee_number"];
          $author['name'] = $absence['created_by'];
          $author['image_url'] = "https://i.pinimg.com/236x/01/89/cb/0189cb0a165cb819087f286fe3774af0--people.jpg";
          $author['locale'] = "en";
          $external_resource['author'] = $author;
          $external_resource['allow_channelback'] = false;
          // $external_resource['fields'] = 

          $external_resource['fields'] = [
            ['id' => 'status', 'value' => 'pending']
          ];
          array_push($external_resources, $external_resource);
          // ["id" => "status", "value" => "pending"]
        }

      }
      \Log::info('ini externalnya');

      // $id = uniqid();
      //http://4.bp.blogspot.com/-jFtfRX8qKm4/UoqfGBFNWYI/AAAAAAAAAYg/PuKga0sNFMk/s1600/blue-bird-taxi-reservation.png
      // $external_resources = [
      //   [
      //     "external_id" => "tes_".$id,
      //     "message" => "Please help. My printer is on fire.",
      //     "html_message" => "Please help. <b>My printer is on fire.</b>",
      //     "created_at" =>  "2015-09-08T22:48:09Z",
      //     "author" => [
      //       'external_id' => "andi_123",
      //       "name" => "Andi",
      //       "image_url" => "https://scontent.cdninstagram.com/hphotos-xap1/t51.2885-19/s150x150/12424615_209564492716268_42714239_a.jpg",
      //       "locale" => "en"
      //     ],
      //     "allow_channelback" => false,
      //     "fields" => [
      //       ["id" => "tags", "value" => ["arriba", "cartel"]],
      //       ["id" => "status", "value" => "pending"]
      //     ]
      //   ]
      // ];

      $response = [
        "external_resources" => $external_resources,
        "state" => json_encode(["count" => $count]),
        "metadata_needs_update" => false,
      ];
      return response()->json($response);

    }

    public function send_reply_url() {

    }

    public function tes(Client $client) {
      $res = $client->put('https://trees-web-service.herokuapp.com/api/v1/absences/batch',[
        'json' => [
          'batch_id' => 1
        ]
        ]);      

      if ($res->getStatusCode() == 200) {
        $json = (string) $res->getBody();
        $data = json_decode($json, true);
        return $data['updated_absences'];
      }

    }


}
