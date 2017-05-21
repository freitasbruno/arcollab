#!/bin/bash
service neo4j stop
mv /var/lib/neo4j/data/databases/graph.db /var/lib/neo4j/data/databases/graph.db.tmpbak
mv /var/lib/neo4j/data/databases/graph.db.bak /var/lib/neo4j/data/databases/graph.db
mv /var/lib/neo4j/data/databases/graph.db.tmpbak /var/lib/neo4j/data/databases/graph.db.bak
service neo4j restart
