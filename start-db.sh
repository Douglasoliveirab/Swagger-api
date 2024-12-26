#!/bin/bash

# Remove contêineres órfãos e para todos os contêineres
echo "Removendo contêineres órfãos e parando contêineres existentes..."
docker-compose down --remove-orphans

# Inicia novamente os contêineres em segundo plano
echo "Subindo os contêineres novamente..."
docker-compose up -d

# Exibe o status dos contêineres para garantir que estão rodando
echo "Verificando o status dos contêineres..."
docker-compose ps
