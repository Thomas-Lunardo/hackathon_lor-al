<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240117164823 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE clothe (id INT AUTO_INCREMENT NOT NULL, color_id INT NOT NULL, clothe VARCHAR(255) NOT NULL, INDEX IDX_C32115BA7ADA1FB5 (color_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE color (id INT AUTO_INCREMENT NOT NULL, color VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, occasion VARCHAR(255) NOT NULL, eyes_colors VARCHAR(255) NOT NULL, skin_color VARCHAR(255) NOT NULL, facepowder TINYINT(1) NOT NULL, lip_stick TINYINT(1) NOT NULL, eye_shadow TINYINT(1) NOT NULL, high_lighter TINYINT(1) NOT NULL, makeup_habit VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_clothe (user_id INT NOT NULL, clothe_id INT NOT NULL, INDEX IDX_A6730E87A76ED395 (user_id), INDEX IDX_A6730E87D554487F (clothe_id), PRIMARY KEY(user_id, clothe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE clothe ADD CONSTRAINT FK_C32115BA7ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id)');
        $this->addSql('ALTER TABLE user_clothe ADD CONSTRAINT FK_A6730E87A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_clothe ADD CONSTRAINT FK_A6730E87D554487F FOREIGN KEY (clothe_id) REFERENCES clothe (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE clothe DROP FOREIGN KEY FK_C32115BA7ADA1FB5');
        $this->addSql('ALTER TABLE user_clothe DROP FOREIGN KEY FK_A6730E87A76ED395');
        $this->addSql('ALTER TABLE user_clothe DROP FOREIGN KEY FK_A6730E87D554487F');
        $this->addSql('DROP TABLE clothe');
        $this->addSql('DROP TABLE color');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_clothe');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
