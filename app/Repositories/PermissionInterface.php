<?php
namespace App\Repositories;


interface PermissionInterface{

    public function all();
    public function find($id);
    public function create(array $data); // type hint /  type define / type cast
    public function update(array $data, $id);
    public function destroy($id);

}

?>
