--1
SELECT CodiceCli, RagioneSociale
FROM Clienti
WHERE CodiceRap = ?; -- sostituisci ? con il codice del rappresentante

--2
SELECT COUNT(*) AS NumeroClienti
FROM Clienti
WHERE CodiceRap = ?; -- sostituisci ? con il codice del rappresentante

--3
SELECT R.CodiceRap, R.CognomeRap, R.NomeRap, COUNT(F.NumeroFatt) AS NumeroFatture
FROM Rappresentanti R
JOIN Clienti C ON R.CodiceRap = C.CodiceRap
JOIN Fatture F ON C.CodiceCli = F.CodiceCli
GROUP BY R.CodiceRap, R.CognomeRap, R.NomeRap;

--4
SELECT C.RagioneSociale, F.DataFatt
FROM Fatture F
JOIN Clienti C ON F.CodiceCli = C.CodiceCli
WHERE F.Importo = (
    SELECT MAX(Importo) FROM Fatture
);

--5
SELECT R.CognomeRap, R.NomeRap
FROM Fatture F
JOIN Clienti C ON F.CodiceCli = C.CodiceCli
JOIN Rappresentanti R ON C.CodiceRap = R.CodiceRap
WHERE F.Importo = (
    SELECT MAX(Importo) FROM Fatture
);

--6
SELECT C.CodiceCli, C.RagioneSociale, SUM(F.Importo) AS TotaleFatturato
FROM Clienti C
JOIN Fatture F ON C.CodiceCli = F.CodiceCli
GROUP BY C.CodiceCli, C.RagioneSociale
HAVING SUM(F.Importo) > ?; -- sostituisci ? con il valore prefissato

--7
SELECT R.CodiceRap, R.CognomeRap, R.NomeRap, COUNT(F.NumeroFatt) AS NumeroFatture
FROM Rappresentanti R
JOIN Clienti C ON R.CodiceRap = C.CodiceRap
JOIN Fatture F ON C.CodiceCli = F.CodiceCli
GROUP BY R.CodiceRap, R.CognomeRap, R.NomeRap
HAVING COUNT(F.NumeroFatt) > ?; -- sostituisci ? con il numero prefissato
