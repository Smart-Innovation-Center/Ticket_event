<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200921184339 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE eventic_organizer DROP FOREIGN KEY FK_C5EEB9A9A76ED395');
        $this->addSql('ALTER TABLE eventic_organizer ADD CONSTRAINT FK_C5EEB9A9A76ED395 FOREIGN KEY (user_id) REFERENCES eventic_user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE eventic_user DROP FOREIGN KEY FK_D01C6A22876C4DDA');
        $this->addSql('ALTER TABLE eventic_user ADD CONSTRAINT FK_D01C6A22876C4DDA FOREIGN KEY (organizer_id) REFERENCES eventic_organizer (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE eventic_organizer DROP FOREIGN KEY FK_C5EEB9A9A76ED395');
        $this->addSql('ALTER TABLE eventic_organizer ADD CONSTRAINT FK_C5EEB9A9A76ED395 FOREIGN KEY (user_id) REFERENCES eventic_user (id)');
        $this->addSql('ALTER TABLE eventic_user DROP FOREIGN KEY FK_D01C6A22876C4DDA');
        $this->addSql('ALTER TABLE eventic_user ADD CONSTRAINT FK_D01C6A22876C4DDA FOREIGN KEY (organizer_id) REFERENCES eventic_organizer (id)');
    }
}
