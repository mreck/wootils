#!/bin/sh
sqlite3 bookmarks.db "$(cat bookmarks.sql)"
