<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 5/9/16
	 * Time: 10:24 AM
	 */

	namespace Zaycon\Whatcounts_Rest\Traits;

    use GuzzleHttp\Exception;
	use Zaycon\Whatcounts_Rest\Models;
    use Zaycon\Whatcounts_Rest\WhatCountsException;

    /**
	 * Class RelationalData
	 * @package Whatcounts_Rest
	 */
	trait RelationalData
	{
		/**
		 * RelationalData Class Name
		 * 
		 * @var string $relational_data_class_name
		 */
		private $relational_data_class_name = '\Zaycon\Whatcounts_Rest\Models\RelationalData';

		/**
		 * @param $relational_table_name
		 * @param $row_id
         * @param bool $retry
         * @param bool $do_async
		 *
		 * @return mixed
         *
         * @throws \Zaycon\Whatcounts_Rest\WhatCountsException
		 */
        public function getRelationalData($relational_table_name, $row_id, $retry = FALSE, $do_async = FALSE)
		{
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
			$whatcounts = $this;

            try
            {
                return $whatcounts->getById($this->relational_table_stub . '/' . $relational_table_name . '/rows', $this->relational_data_class_name, $row_id, $retry, $do_async);
            }
            catch (WhatCountsException $e)
            {
                throw $e;
            }
            catch (Exception\ServerException $e)
            {
                throw $e;
            }
            catch (Exception\RequestException $e)
            {
                throw $e;
            }
		}

		/**
		 * @param      $relational_table_name
		 * @param      $wql
		 * @param      $fields
		 * @param null $skip
		 *
		 * @return array
		 */
		public function searchRelationalData($relational_table_name, $wql, $fields, $skip=NULL)
		{
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
			$whatcounts = $this;

			$query = array();
			$query['wql'] = $wql;
			$query['fields'] = $fields;
			if (isset($skip)) {
				$query['skip'] = $skip;
			}

            try
            {
                $relational_data = $whatcounts->getAll($this->relational_table_stub . '/' . $relational_table_name . '/rows?' . http_build_query($query), $this->relational_data_class_name);
            }
            catch (Exception\ServerException $e)
            {
                throw $e;
            }
            catch (Exception\RequestException $e)
            {
                throw $e;
            }

			return $relational_data;
		}

		/**
		 * @param $relational_table_name
		 * @param $data
         * @param bool $retry
         * @param bool $do_async
		 *
		 * @return bool|object
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */

		public function createRelationalData($relational_table_name, $data, $retry = TRUE, $do_async = FALSE)
		{
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
			$whatcounts = $this;
			
			/** @var Models\RelationalData $data */
			$request_data = $data->getData();

            try
            {
                $promise = $whatcounts->create($this->relational_table_stub . '/' . $relational_table_name, $request_data, $retry, $do_async);
                return $promise;
            }
            catch (Exception\ServerException $e)
            {
                throw $e;
            }
            catch (Exception\RequestException $e)
            {
                throw $e;
            }
		}

		/**
		 * @param $relational_table_name
		 * @param $row_id
		 * @param $data
         * @param bool $retry
         * @param bool $do_async
		 *
		 * @return bool|object
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function updateRelationalData($relational_table_name, $row_id, $data, $retry = TRUE, $do_async = FALSE)
		{
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
			$whatcounts = $this;
			/** @var Models\RelationalData $data */
			$request_data = $data->getData();

            try
            {
                $promise = $whatcounts->update($this->relational_table_stub . '/' . $relational_table_name . '/rows/' . $row_id, $request_data, $retry, $do_async);
                return $promise;
            }
            catch (Exception\ServerException $e)
            {
                throw $e;
            }
            catch (Exception\RequestException $e)
            {
                throw $e;
            }
		}

		/**
		 * @param $relational_table_name
		 * @param $row_id
         * @param bool $retry
         * @param bool $do_async
         *
		 * @return bool
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function deleteRelationalData($relational_table_name, $row_id, $retry = TRUE, $do_async = FALSE)
		{
			$whatcounts = $this;
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */

            try
            {
                $response = $whatcounts->deleteById($this->relational_table_stub . '/' . $relational_table_name . '/rows', $row_id, $retry, $do_async);
            }
            catch (Exception\ServerException $e)
            {
                throw $e;
            }
            catch (Exception\RequestException $e)
            {
                throw $e;
            }

			return $response;
		}
	}