CREATE TABLE bookmarks (
  id         INTEGER  PRIMARY KEY,
  link       TEXT     NOT NULL,
  title      TEXT     NOT NULL,
  tags       TEXT     NOT NULL,
  created_at INTEGER  NOT NULL,
  updated_at INTEGER  NOT NULL
);
