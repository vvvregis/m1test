<?php
namespace interfaces;
interface DataBaseObjectInterface
{
    public function getOne($id);

    public function getAll();

    public function save();

    public function update($id);
}