<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240118093124 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE clothe DROP FOREIGN KEY FK_C32115BA7ADA1FB5');
        $this->addSql('ALTER TABLE facepowder_color DROP FOREIGN KEY FK_D2E235CA7ADA1FB5');
        $this->addSql('ALTER TABLE facepowder_color DROP FOREIGN KEY FK_D2E235CAA64B0248');
        $this->addSql('ALTER TABLE highlighter_color DROP FOREIGN KEY FK_57E9BB437ADA1FB5');
        $this->addSql('ALTER TABLE highlighter_color DROP FOREIGN KEY FK_57E9BB4391BF716A');
        $this->addSql('ALTER TABLE eyeshadow_color DROP FOREIGN KEY FK_A4E1F3C798B54AD');
        $this->addSql('ALTER TABLE eyeshadow_color DROP FOREIGN KEY FK_A4E1F3C7ADA1FB5');
        $this->addSql('ALTER TABLE lipstick_color DROP FOREIGN KEY FK_3864AAFF52AE0418');
        $this->addSql('ALTER TABLE lipstick_color DROP FOREIGN KEY FK_3864AAFF7ADA1FB5');
        $this->addSql('DROP TABLE facepowder_color');
        $this->addSql('DROP TABLE highlighter_color');
        $this->addSql('DROP TABLE eyeshadow_color');
        $this->addSql('DROP TABLE lipstick_color');
        $this->addSql('DROP TABLE color');
        $this->addSql('DROP INDEX IDX_C32115BA7ADA1FB5 ON clothe');
        $this->addSql('ALTER TABLE clothe DROP color_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE facepowder_color (facepowder_id INT NOT NULL, color_id INT NOT NULL, INDEX IDX_D2E235CAA64B0248 (facepowder_id), INDEX IDX_D2E235CA7ADA1FB5 (color_id), PRIMARY KEY(facepowder_id, color_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE highlighter_color (highlighter_id INT NOT NULL, color_id INT NOT NULL, INDEX IDX_57E9BB4391BF716A (highlighter_id), INDEX IDX_57E9BB437ADA1FB5 (color_id), PRIMARY KEY(highlighter_id, color_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE eyeshadow_color (eyeshadow_id INT NOT NULL, color_id INT NOT NULL, INDEX IDX_A4E1F3C7ADA1FB5 (color_id), INDEX IDX_A4E1F3C798B54AD (eyeshadow_id), PRIMARY KEY(eyeshadow_id, color_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE lipstick_color (lipstick_id INT NOT NULL, color_id INT NOT NULL, INDEX IDX_3864AAFF7ADA1FB5 (color_id), INDEX IDX_3864AAFF52AE0418 (lipstick_id), PRIMARY KEY(lipstick_id, color_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE color (id INT AUTO_INCREMENT NOT NULL, color VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE facepowder_color ADD CONSTRAINT FK_D2E235CA7ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE facepowder_color ADD CONSTRAINT FK_D2E235CAA64B0248 FOREIGN KEY (facepowder_id) REFERENCES facepowder (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE highlighter_color ADD CONSTRAINT FK_57E9BB437ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE highlighter_color ADD CONSTRAINT FK_57E9BB4391BF716A FOREIGN KEY (highlighter_id) REFERENCES highlighter (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE eyeshadow_color ADD CONSTRAINT FK_A4E1F3C798B54AD FOREIGN KEY (eyeshadow_id) REFERENCES eyeshadow (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE eyeshadow_color ADD CONSTRAINT FK_A4E1F3C7ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lipstick_color ADD CONSTRAINT FK_3864AAFF52AE0418 FOREIGN KEY (lipstick_id) REFERENCES lipstick (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lipstick_color ADD CONSTRAINT FK_3864AAFF7ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE clothe ADD color_id INT NOT NULL');
        $this->addSql('ALTER TABLE clothe ADD CONSTRAINT FK_C32115BA7ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_C32115BA7ADA1FB5 ON clothe (color_id)');
    }
}
