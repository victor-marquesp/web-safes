
CREATE TABLE currencies (               -- ✅ ALL IMPLEMENTED
    id INT PRIMARY KEY,                 -- ✔️ implemented
    name VARCHAR(255) NOT NULL,         -- ✔️ implemented
    description TEXT,                   -- ✔️ implemented
    icon_path VARCHAR(255)              -- ✔️ implemented
);

CREATE TABLE coins (                    -- ✅ ALL IMPLEMENTED
    id INT PRIMARY KEY,                 -- ✔️ implemented
    name VARCHAR(255) NOT NULL,         -- ✔️ implemented
    currency_id INT NOT NULL,           -- ✔️ implemented
    value INT NOT NULL,                 -- ✔️ implemented
    icon_path VARCHAR(255),             -- ✔️ implemented
    FOREIGN KEY (currency_id) REFERENCES currencies(id)
);

CREATE TABLE animals (                  -- ✅ ALL IMPLEMENTED
    id INT PRIMARY KEY,                 -- ✔️ implemented
    name VARCHAR(255) NOT NULL,         -- ✔️ implemented
    description TEXT,                   -- ✔️ implemented
    icon_path VARCHAR(255)              -- ✔️ implemented
);


CREATE TABLE safes (
    id INT PRIMARY KEY,                 -- ✔️ implemented             
    animal_id INT NOT NULL,             -- ✔️ implemented
    currency_id INT NOT NULL,
    name VARCHAR(255),                  -- ✔️ implemented
    description TEXT,                   -- ✔️ implemented
    FOREIGN KEY (animal_id) REFERENCES animals(id),
    FOREIGN KEY (currency_id) REFERENCES currencies(id)
);

CREATE TABLE deposits (
    id INT PRIMARY KEY,
    safer_id INT NOT NULL,
    coin_id INT,
    amount INT NOT NULL,
    FOREIGN KEY (safer_id) REFERENCES safers(id),
    FOREIGN KEY (coin_id) REFERENCES coins(id)
);

INSERT INTO animals (id, name) VALUES 
(1, 'piggy');

INSERT INTO currencies (id, name) VALUES 
(1, 'real');

INSERT INTO coins (id, name, currency_id, value) VALUES 
(1, '1 real', 1, 100),
(2, '50 centavos', 1, 50),
(3, '25 centavos', 1, 25);

INSERT INTO safers (id, animal_id, currency_id) VALUES 
(1, 1, 1);

INSERT INTO deposits (id, safer_id, coin_id, amount) VALUES 
(1, 1, 1, 1),
(2, 1, 2, 5),
(3, 1, 3, 10);
