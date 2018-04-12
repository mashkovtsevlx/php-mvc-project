<?php

class Model_Main extends Model
{
    public $page;

    public function __construct($page = null)
    {
        $this->page = $page;
    }

    public function get_page($num = 1, $order = 'name')
    {
        $db = Db::getInstance();
        $num = (intval($num) - 1) * 3;

        $request = $db->prepare('SELECT * FROM cards ORDER BY ' . $order . ' limit ' . $num . ', 3');
        $request->execute();
        $page['cards'] = $request->fetchAll();
        $request = $db->prepare('SELECT id FROM cards');
        $request->execute();
        $page['qty'] = $request->rowCount();

        return $page;
    }

    private function image_exists($file_num)
    {
        $types = array('jpg', 'png', 'gif', 'bmp', 'jpeg');
        foreach($types as $type)
        {
            if (file_exists('images/uploads/'.$file_num.'.'.$type))
                return true;
        }
        return false;
    }

    private function imageresize($infile,$neww,$newh,$quality) {
        $im=imagecreatefromjpeg($infile);
        $k1=$neww/imagesx($im);
        $k2=$newh/imagesy($im);
        $k=$k1>$k2?$k2:$k1;

        $w=intval(imagesx($im)*$k);
        $h=intval(imagesy($im)*$k);

        $im1=imagecreatetruecolor($w,$h);
        imagecopyresampled($im1,$im,0,0,0,0,$w,$h,imagesx($im),imagesy($im));

        imagejpeg($im1,$infile,$quality);
        imagedestroy($im);
        imagedestroy($im1);
    }

    public function new_card($name, $email, $text)
    {
        $db = Db::getInstance();

        $file_num = 1;
        while ($this->image_exists($file_num))
        {
            $file_num++;
        }
        if (isset($_FILES['userfile']))
        {
            $getMime = explode('.', $_FILES['userfile']['name']);
            $mime = strtolower(end($getMime));
            $types = array('jpg', 'png', 'gif', 'bmp', 'jpeg');
            if(in_array($mime, $types))
            {
                move_uploaded_file($_FILES['userfile']['tmp_name'], 'images/uploads/'.$file_num.'.'.$mime);
                $this->imageresize('images/uploads/'.$file_num.'.'.$mime,320,240,100);
            }
            else
            {
                $file_num = 'default';
                $mime = 'jpg';
            }
        }
        else
        {
            $file_num = 'default';
            $mime = 'jpg';
        }
        $query = 'INSERT INTO cards (name, email, text, img) VALUES (\''.$name.'\', \''.$email.'\', \''.$text.'\', \''.$file_num.'.'.$mime.'\')';
        $request = $db->prepare($query);
        $request->execute();
        header('Location: /');
    }
    public function update_card_text($text, $pre_id)
    {
        $db = Db::getInstance();

        $array_id = explode('-', $pre_id);
        $id = end($array_id);
        $query = 'UPDATE `cards` SET `text` = \''.$text.'\' WHERE id = '.$id;
        $request = $db->prepare($query);
        $request->execute();
    }
    public function update_card_status($status, $pre_id)
    {
        $db = Db::getInstance();

        $array_id = explode('-', $pre_id);
        $id = end($array_id);
        $query = 'UPDATE `cards` SET `status` = \''.$status.'\' WHERE id = '.$id;
        $request = $db->prepare($query);
        $request->execute();
    }
}

?>
