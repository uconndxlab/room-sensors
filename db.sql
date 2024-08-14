CREATE TABLE ping (
    id INT PRIMARY KEY,
    room TEXT,
    motion BOOLEAN,
    humid TEXT,
    temp TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);