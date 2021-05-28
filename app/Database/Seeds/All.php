<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class All extends Seeder
{
    public function run()
    {
        // Seed Books
        $data = [
            'Name'=>'Алгоритмы на Java',
            'Author'=>'Роберт Седжвик, Кевин Уэйн'
        ];
        $this->db->table('Books')->insert($data);
        $data = [
            'Name'=>'Сам себе программист',
            'Author'=>'Кори Альтхофф'
        ];
        $this->db->table('Books')->insert($data);
        $data = [
            'Name'=>'Rapid Development',
            'Author'=>'Стив Макконел'
        ];
        $this->db->table('Books')->insert($data);
        $data = [
            'Name'=>'Кодеры за работой',
            'Author'=>'Питер Сейбел'
        ];
        $this->db->table('Books')->insert($data);
        $data = [
            'Name'=>'Предметно-ориентированное проектирование',
            'Author'=>'Эрик Эванс'
        ];
        $this->db->table('Books')->insert($data);
        $data = [
            'Name'=>'Искусство программирования',
            'Author'=>'Дональд Кнут'
        ];
        $this->db->table('Books')->insert($data);

        // Seed Reader
        $this->db->table('Reader')->insert($data);
        $data = [
            'FIO'=>'Гуртовенко Андрей Викторович',
        ];
        $this->db->table('Reader')->insert($data);
        $data = [
            'FIO'=>'Сиренко Николай Викторович',
        ];
        $this->db->table('Reader')->insert($data);
        $data = [
            'FIO'=>'Куцуев Егор Игоревич',
        ];
        $this->db->table('Reader')->insert($data);
        $data = [
            'FIO'=>'Бардаков Павел Дмитриевич',
        ];
        $this->db->table('Reader')->insert($data);
        $data = [
            'FIO'=>'Алексеев Алексей Вадимович',
        ];
        $this->db->table('Reader')->insert($data);
        $data = [
            'FIO'=>'Ахмитов Кирилл Русланович',
        ];
        $this->db->table('Reader')->insert($data);
        
        // Seed instance
        $data = [
            'id_book'=>'1',
            'wear_coefficient'=>'1'
        ];
        $this->db->table('Instance')->insert($data);
        $data = [
            'id_book'=>'1',
            'wear_coefficient'=>'2'
        ];
        $this->db->table('Instance')->insert($data);
        $data = [
            'id_book'=>'1',
            'wear_coefficient'=>'3'
        ];
        $this->db->table('Instance')->insert($data);
        $data = [
            'id_book'=>'2',
            'wear_coefficient'=>'1'
        ];
        $this->db->table('Instance')->insert($data);
        $data = [
            'id_book'=>'2',
            'wear_coefficient'=>'2'
        ];
        $this->db->table('Instance')->insert($data);
        $data = [
            'id_book'=>'3',
            'wear_coefficient'=>'1'
        ];
        $this->db->table('Instance')->insert($data);
        $data = [
            'id_book'=>'3',
            'wear_coefficient'=>'1'
        ];
        $this->db->table('Instance')->insert($data);
        $data = [
            'id_book'=>'4',
            'wear_coefficient'=>'1'
        ];
        $this->db->table('Instance')->insert($data);
        $data = [
            'id_book'=>'5',
            'wear_coefficient'=>'1'
        ];
        $this->db->table('Instance')->insert($data);
        $data = [
            'id_book'=>'5',
            'wear_coefficient'=>'1'
        ];
        $this->db->table('Instance')->insert($data);
        $data = [
            'id_book'=>'6',
            'wear_coefficient'=>'2'
        ];
        $this->db->table('Instance')->insert($data);

        




        
    }
}