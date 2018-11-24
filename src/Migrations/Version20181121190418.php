<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181121190418 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE etape_davancement DROP FOREIGN KEY FK_67C7C33965CBC921');
        $this->addSql('DROP INDEX IDX_67C7C33965CBC921 ON etape_davancement');
        $this->addSql('ALTER TABLE etape_davancement CHANGE carnet_de_bord_id_id carnet_de_bord_id INT NOT NULL');
        $this->addSql('ALTER TABLE etape_davancement ADD CONSTRAINT FK_67C7C33941D00480 FOREIGN KEY (carnet_de_bord_id) REFERENCES carnet_de_bord (id)');
        $this->addSql('CREATE INDEX IDX_67C7C33941D00480 ON etape_davancement (carnet_de_bord_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE etape_davancement DROP FOREIGN KEY FK_67C7C33941D00480');
        $this->addSql('DROP INDEX IDX_67C7C33941D00480 ON etape_davancement');
        $this->addSql('ALTER TABLE etape_davancement CHANGE carnet_de_bord_id carnet_de_bord_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE etape_davancement ADD CONSTRAINT FK_67C7C33965CBC921 FOREIGN KEY (carnet_de_bord_id_id) REFERENCES carnet_de_bord (id)');
        $this->addSql('CREATE INDEX IDX_67C7C33965CBC921 ON etape_davancement (carnet_de_bord_id_id)');
    }
}
