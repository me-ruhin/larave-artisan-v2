<?php
namespace App\Repositories;
use App\Models\Permission;

class PermissionRepository implements PermissionInterface{

    protected $permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission ;
    }

    public function all(){
       return $this->permission->all();
    }

    public function find($id){
       return $this->permission->find($id);
    }

    public function create(array $data){
        return $this->permission->create($data);
    }

    public function update(array $data, $id){
        return $this->permission->find($id)->update($data);
    }

    public function destroy($id){
        return $this->permission->destroy($id);
    }
}

?>
