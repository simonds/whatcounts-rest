<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/28/16
	 * Time: 8:27 AM
	 */

	namespace ZayconWhatCounts;


	trait RelationalTableTraits
	{
		private $relational_table_stub = 'relationalTables';
		private $relational_table_class_name = '\ZayconWhatCounts\RelationalTable';

		public function getRelationalTables()
		{
			/** @var WhatCounts $whatcounts */
			$whatcounts = $this;
			$relational_tables = $whatcounts->getAll($this->relational_table_stub, $this->relational_table_class_name);
			
			return $relational_tables;
		}
		
	}