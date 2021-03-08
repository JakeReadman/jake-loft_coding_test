# jake-loft_coding_test

The Task:
Write a PHP application that can accept a set of journey steps in any order, and output the
journey in the correct order.

Instructions:

A journey step must be in the form of the following JSON schema:

    {
        "type": "object",
        "properties": {
            "from": {"type": "string"},
            "to": {"type": "string"}
        }
    }

- Instantiate a new Journey object with a JSON file path (using the above schema) as the only parameter.
- Call the process method on the new Journey object with no arguments.

This will return an outputted JSON-formatted array of all locations visited in the correct order
