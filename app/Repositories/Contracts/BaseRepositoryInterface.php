<?php

namespace App\Repositories\Contracts;

use App\Exceptions\RepositoryException;
use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
    /**
     *
     */
    public function boot();

    /**
     * @throws RepositoryException
     */
    public function resetModel();

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model();

    /**
     * @return Model
     * @throws RepositoryException
     */
    public function makeModel();

    /**
     * Retrieve all data of repository
     *
     * @param array $columns
     *
     * @return mixed
     * @throws RepositoryException
     */
    public function all($columns = ['*']);

    /**
     * Alias of All method
     *
     * @param array $columns
     *
     * @return mixed
     * @throws RepositoryException
     */
    public function get($columns = ['*']);

    /**
     * Retrieve first data of repository
     *
     * @param array $columns
     *
     * @return mixed
     * @throws RepositoryException
     */
    public function first($columns = ['*']);

    /**
     * Retrieve all data of repository, paginated
     *
     * @param null|int $limit
     * @param array $columns
     * @param string $method
     *
     * @return mixed
     * @throws RepositoryException
     */
    public function paginate($limit = null, $columns = ['*'], $method = "paginate");

    /**
     * Find data by id
     *
     * @param       $id
     * @param array $columns
     *
     * @return mixed
     * @throws RepositoryException
     */
    public function find($id, $columns = ['*']);

    /**
     * Find data by field and value
     *
     * @param       $field
     * @param       $value
     * @param array $columns
     *
     * @return mixed
     * @throws RepositoryException
     */
    public function findByField($field, $value = null, $columns = ['*']);

    /**
     * Save a new entity in repository
     *
     * @param array $attributes
     *
     * @return mixed
     * @throws RepositoryException
     */
    public function create(array $attributes);

    /**
     * Update a entity in repository by id
     *
     * @param array $attributes
     * @param       $id
     *
     * @return mixed
     * @throws RepositoryException
     */
    public function update(array $attributes, $id);

    /**
     * Delete a entity in repository by id
     *
     * @param $id
     *
     * @return int
     * @throws RepositoryException
     */
    public function delete($id);
}
