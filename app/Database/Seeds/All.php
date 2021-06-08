<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class All extends Seeder
{
    public function run()
    {
        $data = [
            'Name'=>'Java book',
            'Description'=>'Java book',
            'Price'=>2000,
            'pictureUrl'=>'http://polka.tplinkdns.com:9000/bookshop//book1.png',
        ];
        $this->db->table('Books')->insert($data);
        $data = [
            'Name'=>'Java book 1',
            'Description'=>'Java book 1',
            'Price'=>1500,
            'pictureUrl'=>'http://polka.tplinkdns.com:9000/bookshop//book2.png',
        ];
        $this->db->table('Books')->insert($data);
        $data = [
            'Name'=>'Java book 2',
            'Description'=>'Java book 2',
            'Price'=>2500,
            'pictureUrl'=>'http://polka.tplinkdns.com:9000/bookshop//book3.png',
        ];
        $this->db->table('Books')->insert($data);
        $data = [
            'Name'=>'Java book 3',
            'Description'=>'Java book 3',
            'Price'=>1500,
            'pictureUrl'=>'http://polka.tplinkdns.com:9000/bookshop//book4.png',
        ];
        $this->db->table('Books')->insert($data);

        
        $data = [
            'FIO'=>'Гуртовенко Андрей Викторович',
            'pictureUrl'=>'http://polka.tplinkdns.com:9000/bookshop//stupid_face.png',
        ];
        $this->db->table('Client')->insert($data);
        $data = [
            'FIO'=>'Сиренко Николай Викторович',
            'pictureUrl'=>'http://polka.tplinkdns.com:9000/bookshop//stupid_face.png',
        ];
        $this->db->table('Client')->insert($data);
        $data = [
            'FIO'=>'Куцуев Егор Игоревич',
            'pictureUrl'=>'http://polka.tplinkdns.com:9000/bookshop//stupid_face.png',
        ];
        $this->db->table('Client')->insert($data);
        $data = [
            'FIO'=>'Бардаков Павел Дмитриевич',
            'pictureUrl'=>'http://polka.tplinkdns.com:9000/bookshop//stupid_face.png',
        ];
        $this->db->table('Client')->insert($data);
        $data = [
            'FIO'=>'Алексеев Алексей Вадимович',
            'pictureUrl'=>'http://polka.tplinkdns.com:9000/bookshop//stupid_face.png',
        ];
        $this->db->table('Client')->insert($data);
        $data = [
            'FIO'=>'Ахмитов Кирилл Русланович',
            'pictureUrl'=>'http://polka.tplinkdns.com:9000/bookshop//stupid_face.png',
        ];
        $this->db->table('Client')->insert($data);
        


        




        
    }
}