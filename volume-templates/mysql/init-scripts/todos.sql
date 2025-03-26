CREATE TABLE IF NOT EXISTS todos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    text TEXT NOT NULL
);

INSERT INTO
    todos (id, text)
VALUES
    (1, 'Todo item 1'),
    (2, 'Todo item 2'),
    (3, 'Todo item 3') ON DUPLICATE KEY
UPDATE text = 
VALUES
    (text);