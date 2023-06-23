CREATE user if not exists groupe4 identified by 'groupe4';
grant all privileges on Calculatrice.* to  groupe4;

CREATE DATABASE if NOT EXISTS Calculatrice DEFAULT CHARACTER set 'utf8';

/*********************CREATION DES TABLES*****************************

/* la table opérations */
CREATE TABLE Operations (
  ID int AUTO_INCREMENT not null PRIMARY KEY,
  Expression VARCHAR(255) not null,
  Resultat DECIMAL(10,7),
  Date_operation DATETIME
);

INSERT INTO Operations (Expression, Resultat, Date_operation)
VALUES
    ('(2 + 3) * 4', 20, NOW()),
    ('6 / (2 + 1)', 2, NOW()),
    ('(8 - 5) * 100', 300, NOW()),
    ( '(50 * 0.1)', 5.00, Now()),
    ('(4 * 2) + 10', 18, NOW()),
    ('(7 + 3) / 2', 5, NOW()),
    ('(6 - 2) * 5', 20, NOW()),
    ('(12 / 3) + 2', 6, NOW());
    


