#!/bin/bash
cd /opt/neo4j-community-3.1.0/bin
./neo4j stop
rm -rf ../data/databases/graph.db
./neo4j start
cd /var/www/html/codiad/workspace/arcollab/arcollabWeb
