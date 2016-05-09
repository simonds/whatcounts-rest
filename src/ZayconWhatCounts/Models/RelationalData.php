<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 5/9/16
	 * Time: 10:19 AM
	 */

	namespace ZayconWhatCounts;


	class RelationalData
	{
		private $data;

		public function __construct(\stdClass $relational_data_response = NULL, $time_zone = NULL)
		{
			if (isset($relational_data_response))
			{
				$this->setData($relational_data_response);
			}

		}

		/**
		 * @return array
		 */
		public function getRequestArray()
		{
			$request_array = array(
				$this->getData()
			);
			return $request_array;
		}

		/**
		 * @return mixed
		 */
		public function getData()
		{
			return $this->data;
		}

		/**
		 * @param mixed $data
		 *
		 * @return RelationalData
		 */
		public function setData($data)
		{
			$this->data = (object)$data;

			return $this;
		}


	}