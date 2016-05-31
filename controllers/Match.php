<?php
class Match extends VK_Controller {
    function decouverte()
    {
        $pref_s = $_SESSION['user']['orientation'];
        $uid = $_SESSION['user']['id'];
        $usexe = $_SESSION['user']['sexe'];
        if($pref_s == 0) {
            if ($usexe == 1) {
                $profils = $this->user_model->get_profils_for($uid, 1, 1);
                $profils .= $this->user_model->get_profils_for($uid, 2, 2);
            }
            else
                $profils = $this->user_model->get_profils_for($uid, 1, 2);
                $profils .= $this->user_model->get_profils_for($uid, 2, 1);
        }
        else if ($pref_s == 1) {
            if ($usexe == 1)
                $profils = $this->user_model->get_profils_for($uid, 2, 2);
            else
                $profils = $this->user_model->get_profils_for($uid, 1, 2);
        }
        else if ($pref_s == 2) {
            if ($usexe == 1)
                $profils = $this->user_model->get_profils_for($uid, 1, 1);
            else
                $profils = $this->user_model->get_profils_for($uid, 2, 1);
        }
        foreach ($profils as &$profil) {
            $occurencetag = 0;
            $ptag = $this->user_model->get_tag($profil['id']);
            $mytag = $this->user_model->get_tag($uid);
            foreach ($mytag as $key => $tmptag) {
                foreach ($ptag as $key2 => $tmptag2) {
                    if ($tmptag['nom'] == $tmptag2['nom']) {
                        $occurencetag++;
                    }
                }
            }
              $profil['score'] = $occurencetag;
//            print_r($profil);
//            echo '<br>';
        }
        function array_sort_by_column(&$arr, $col, $dir = SORT_DESC) {
            $sort_col = array();
            foreach ($arr as $key=> $row) {
                $sort_col[$key] = $row[$col];
            }
            array_multisort($sort_col, $dir, $arr);
        }
        array_sort_by_column($profils, 'score');
//        print_r($profils);
        $data['profils'] = $profils;
        $this->set($data);
        $this->views('decouverte');
    }
}