CREATE TABLE ping (
    id INT PRIMARY KEY,
    room TEXT,
    motion TEXT,
    alive TEXT,
    humid TEXT,
    temp TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);