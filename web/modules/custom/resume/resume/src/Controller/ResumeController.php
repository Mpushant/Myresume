<?php
    namespace Drupal\resume\Controller;
    use Drupal\Core\Controller\ControllerBase;
    use Drupal\node\Entity\Node;

    class ResumeController extends ControllerBase{
        public function createResume($nid){
          $transNode = Node::load($nid);
          $output = '<div class = "seller-details"><h6></h6>';
          $output.= '<p><b> Form Type: </b><span>' .$transNode->get('title')->value. '</span></p>';
          $output.= '<p><b>Name : </b><span>' .$transNode->get('field_name')->value. '</span></p>';
          $output.= '<p><b>Email: </b><span>'.$transNode->get('field_email')->value. '</span></p>';
          $output.= '<p><b>Contact No : </b><span>' .$transNode->get('field_contact_no')->value. '</span></p>';
          $output.= '<p><b>Achievements : </b><span>' .$transNode->get('field_achievements')->value. '</span></p>';
          $output.= '<p><b>Ssc : </b><span>' .$transNode->get('field_ssc')->value. '</span></p>';
          $output.= '<p><b>Hsc/Diploma : </b><span>'.$transNode->get('field_hsc_diploma')->value. '</span></p>';
          $output.= '<p><b>Candidate Degree : </b><span>'.$transNode->get('field_degree')->value. '</span></p>';
        //   $output.= '<p><b>Candidate HSC/Diploma Marks : </b><span>'.$transNode->get('field_hsc_diploma')->value. '</span></p>';
        //   $output.= '<p><b>Candidate Degree Marks : </b><span>'.$transNode->get('field_degree')->value. '</span></p>';
        //   $output.= '<p><b>Candidate Skills : </b><span>' .$transNode->get('field_skills')->value. '</span></p>';
        //   $output.= '<p><b>Language Known : </b><span>' .$transNode->get('field_language_known')->value. '</span></p>';
          //  $output.= '<p><b>Account Manager Name : </b><span>' . $acc_manager_name . '</span></p>';
          //  $output.= '<p><b>Account Manager Email : </b><span>' . $acc_manager_email . '</span></p>';
          $output.= '</div>';
        
            return [
              '#type' => 'markup',
              '#markup' => $output,
            ];
        
    }
}