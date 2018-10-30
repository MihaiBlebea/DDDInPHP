# Persistence Class

### Methods:

##### public function construct()
- requires Connector class
- stores the connector into private connector

##### public function getTable()
- returns the saved table name to create different schemas

##### public function setTable()
- must be set before calling any CRUD method on this class
- sets the table name

##### public function connect()
- returns the connector from the Connector class stored in this class

##### public function where()
- accepts a valueA, operand and valueB
- creates the query schema

##### public function orWhere()
- accepts a valueA, operand and valueB
- if schema is not null, then it adds an 'OR' operation and another secondary schema
