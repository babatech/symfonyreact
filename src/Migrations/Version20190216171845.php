<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190216171845 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE restaurant (id INTEGER NOT NULL, name VARCHAR(255) DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, status_id INTEGER DEFAULT NULL, fav INTEGER DEFAULT NULL, best_match DOUBLE PRECISION DEFAULT NULL, newest DOUBLE PRECISION DEFAULT NULL, rating_average DOUBLE PRECISION DEFAULT NULL, distance INTEGER DEFAULT NULL, popularity DOUBLE PRECISION DEFAULT NULL, average_product_price INTEGER DEFAULT NULL, delivery_costs INTEGER DEFAULT NULL, min_cost INTEGER DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE restaurants ADD COLUMN statusid INTEGER NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE restaurant');
        $this->addSql('CREATE TEMPORARY TABLE __temp__restaurants AS SELECT id, name, status, best_match, newest, rating_average, distance, popularity, average_product_price, delivery_costs, min_cost, favourite FROM restaurants');
        $this->addSql('DROP TABLE restaurants');
        $this->addSql('CREATE TABLE restaurants (id INTEGER NOT NULL, name VARCHAR(255) DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, best_match DOUBLE PRECISION DEFAULT NULL, newest DOUBLE PRECISION DEFAULT NULL, rating_average DOUBLE PRECISION DEFAULT NULL, distance INTEGER DEFAULT NULL, popularity DOUBLE PRECISION DEFAULT NULL, average_product_price INTEGER DEFAULT NULL, delivery_costs INTEGER DEFAULT NULL, min_cost INTEGER DEFAULT NULL, favourite BOOLEAN DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO restaurants (id, name, status, best_match, newest, rating_average, distance, popularity, average_product_price, delivery_costs, min_cost, favourite) SELECT id, name, status, best_match, newest, rating_average, distance, popularity, average_product_price, delivery_costs, min_cost, favourite FROM __temp__restaurants');
        $this->addSql('DROP TABLE __temp__restaurants');
    }
}
