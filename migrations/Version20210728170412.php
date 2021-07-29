<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210728170412 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE invoice_detail (id INT AUTO_INCREMENT NOT NULL, invoice_id INT DEFAULT NULL, order_detail_id INT DEFAULT NULL, INDEX IDX_9530E2C02989F1FD (invoice_id), UNIQUE INDEX UNIQ_9530E2C064577843 (order_detail_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE invoice_detail ADD CONSTRAINT FK_9530E2C02989F1FD FOREIGN KEY (invoice_id) REFERENCES invoice (id)');
        $this->addSql('ALTER TABLE invoice_detail ADD CONSTRAINT FK_9530E2C064577843 FOREIGN KEY (order_detail_id) REFERENCES order_detail (id)');
        $this->addSql('ALTER TABLE invoice ADD customer_id INT DEFAULT NULL, ADD invoice_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD discount NUMERIC(7, 2) NOT NULL, ADD tax NUMERIC(7, 2) NOT NULL');
        $this->addSql('ALTER TABLE invoice ADD CONSTRAINT FK_906517449395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('CREATE INDEX IDX_906517449395C3F3 ON invoice (customer_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE invoice_detail');
        $this->addSql('ALTER TABLE invoice DROP FOREIGN KEY FK_906517449395C3F3');
        $this->addSql('DROP INDEX IDX_906517449395C3F3 ON invoice');
        $this->addSql('ALTER TABLE invoice DROP customer_id, DROP invoice_date, DROP discount, DROP tax');
    }
}
