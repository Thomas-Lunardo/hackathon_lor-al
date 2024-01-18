<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240118131324 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_clothe DROP FOREIGN KEY FK_A6730E87A76ED395');
        $this->addSql('ALTER TABLE user_clothe DROP FOREIGN KEY FK_A6730E87D554487F');
        $this->addSql('DROP TABLE user_clothe');
        $this->addSql('ALTER TABLE clothe ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE clothe ADD CONSTRAINT FK_C32115BAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_C32115BAA76ED395 ON clothe (user_id)');
        $this->addSql('ALTER TABLE user DROP makeup_habit');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_clothe (user_id INT NOT NULL, clothe_id INT NOT NULL, INDEX IDX_A6730E87A76ED395 (user_id), INDEX IDX_A6730E87D554487F (clothe_id), PRIMARY KEY(user_id, clothe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE user_clothe ADD CONSTRAINT FK_A6730E87A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_clothe ADD CONSTRAINT FK_A6730E87D554487F FOREIGN KEY (clothe_id) REFERENCES clothe (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD makeup_habit VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE clothe DROP FOREIGN KEY FK_C32115BAA76ED395');
        $this->addSql('DROP INDEX IDX_C32115BAA76ED395 ON clothe');
        $this->addSql('ALTER TABLE clothe DROP user_id');
    }
}
