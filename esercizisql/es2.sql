SELECT C.CodiceCli, C.RagioneSociale, C.Indirizzo, C.Telefono, C.PartitaIVA
FROM Clienti C
JOIN Rappresentanti R ON C.CodiceRap = R.CodiceRap
WHERE R.CodiceRap = <CodiceRap>;

SELECT COUNT(C.CodiceCli) AS NumeroClienti
FROM Clienti C
WHERE C.CodiceRap = <CodiceRap>;

SELECT R.CodiceRap, R.CognomeRap, R.NomeRap, COUNT(F.NumeroFatt) AS NumeroFatture
FROM Fatture F
JOIN Clienti C ON F.CodiceCli = C.CodiceCli
JOIN Rappresentanti R ON C.CodiceRap = R.CodiceRap
GROUP BY R.CodiceRap, R.CognomeRap, R.NomeRap;

SELECT C.RagioneSociale, F.DataFatt
FROM Fatture F
JOIN Clienti C ON F.CodiceCli = C.CodiceCli
WHERE F.Importo = (SELECT MAX(Importo) FROM Fatture);

SELECT R.CognomeRap, R.NomeRap
FROM Fatture F
JOIN Clienti C ON F.CodiceCli = C.CodiceCli
JOIN Rappresentanti R ON C.CodiceRap = R.CodiceRap
WHERE F.Importo = (SELECT MAX(Importo) FROM Fatture);

SELECT C.CodiceCli, C.RagioneSociale
FROM Clienti C
JOIN Fatture F ON C.CodiceCli = F.CodiceCli
GROUP BY C.CodiceCli, C.RagioneSociale
HAVING SUM(F.Importo) > <ValorePrefissato>;

SELECT R.CodiceRap, R.CognomeRap, R.NomeRap
FROM Fatture F
JOIN Clienti C ON F.CodiceCli = C.CodiceCli
JOIN Rappresentanti R ON C.CodiceRap = R.CodiceRap
GROUP BY R.CodiceRap, R.CognomeRap, R.NomeRap
HAVING COUNT(F.NumeroFatt) > <NumeroPrefissato>;
